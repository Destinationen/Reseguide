<?php

namespace Chas\APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Chas\APIBundle\Utility\RequestHash;
use Chas\APIBundle\Entity\APICache;
use Zend\Http\Client;

class APIController extends Controller
{
    public function welcomeAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery(
            'SELECT DISTINCT tt.type FROM ChasAPIBundle:TimeTable tt'
        );
        $r = $query->getResult();
        
        return $this->render('ChasAPIBundle:Default:welcome.html.twig', array('timetables' => $r));
    }

    public function indexAction($resource)
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $r = $em->getRepository('ChasAPIBundle:TimeTable')
            ->findByType($resource);

        return $this->render('ChasAPIBundle:Default:index.html.twig', array('resources' => $r, 'r' => $resource));
        
    }

    public function singleAction($resource, $id)
    {
        echo RequestHash::getHash();

        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:TimeTableStops')
            ->findByTimetable($id);

        return $this->render('ChasAPIBundle:Default:single.html.twig', array('resources' => $r));
    }

    public function carpoolAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:CarPool')
            ->findAllOrderedByDate();
        
        $extension = $request->get('_format');
        $e = null;
        if (null !== $extension && $request->getMimeType($extension)){
            $e = $request->getMimeType($extension);
        }
        
        switch ($e){
            case 'application/json':
                $response = new Response($this->carpool_json($r));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
                break;
            case 'text/xml':
                $response = $this->render('ChasAPIBundle:CarPool:index.xml.twig', array('resources' => $r));
                $response->headers->set('Content-Type', 'application/xml');
                return $response;
                break;
            default:
                return $this->render('ChasAPIBundle:CarPool:index.html.twig', array('resources' => $r));
                break;
        }

    }
    
    private function carpool_json($r){
        $return = array();

        foreach ($r as &$trip){
            $tmp['id'] = $trip->getId();
            $tmp['url'] = $this->generateUrl('API_carpool_single', array('id' => $trip->getId()), true);
            $tmp['departure'] = $trip->getDeparture();
            $tmp['destination'] = $trip->getDestination()->getName();
            $tmp['seats'] = $trip->getSeats();

            $return[] = $tmp;
        }

        return json_encode($return);
    }

    public function carpool_singleAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:CarPool')
            ->findOneById($id);

        return $this->render('ChasAPIBundle:CarPool:single.html.twig', array('resource' => $r));

    }

    public function weatherAction($lat, $lon)
    {
        $d = new \DateTime('now');
        $yr = 'http://api.yr.no/weatherapi/locationforecast/1.8/?lat='.$lat.';lon='.$lon.';msl=583';

        $requestHash = RequestHash::getHash($yr);
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $ac = $em->getRepository('ChasAPIBundle:APICache')
            ->findCached($requestHash, $d);
        if (!$ac){
            //No one has requested this before, or it was to long ago, lets get the response and cache it here and then send it to the client.
            
            $zHttpConf = array(
                'maxredirects'       => 0,
                'timeout'            => 30,
            );
            $client = new Client($yr, $zHttpConf);
            $content = $client->send();
            $r = $content->getBody();
            
            $d = new \Datetime('now');

            $apic = new APICache();
            $apic->setRequest($requestHash);
            $apic->setResponse($r);
            $apic->setCreateddate($d);
            
            $apic_em = $em;

            $apic_em->persist($apic);
            $apic_em->flush();

        } else {
            // EY! LOOK AT THAT! We are not the first ones here!

            $r = '<destination>cache</destination>'.$ac->getResponse();
        }

        return new Response($r);
    }
    
    public function pageAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:Page')
            ->findAll();
        
        $extension = $request->get('_format');
        $e = null;
        if (null !== $extension && $request->getMimeType($extension)){
            $e = $request->getMimeType($extension);
        }
        
        switch ($e){
            case 'application/json':
                $response = new Response($this->page_json($r));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
                break;
            case 'text/xml':
                $response = $this->render('ChasAPIBundle:Page:all.xml.twig', array('pages' => $r));
                $response->headers->set('Content-Type', 'application/xml');
                return $response;
                break;
            default:
                return $this->render('ChasAPIBundle:Page:all.html.twig', array('pages' => $r));
                break;
        }

    }
    
    private function page_json($r){
        $return = array();
 
        foreach ($r as &$page){
            $tmp = array();

            $tmp['page'] = $page->getPage();
            $tmp['email'] = $page->getEmail();
            $tmp['phonenumber'] = $page->getPhonenumber();
            $tmp['address'] = $page->getAddress();

            $return[] = $tmp;
        }
       
        return json_encode($return);
    }

    public function pageSingleAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:Page')
            ->findOneByPage($id);
        
        $extension = $request->get('_format');
        $e = null;
        if (null !== $extension && $request->getMimeType($extension)){
            $e = $request->getMimeType($extension);
        }
        
        switch ($e){
            case 'application/json':
                $response = new Response($this->pageSingle_json($r));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
                break;
            case 'text/xml':
                $response = $this->render('ChasAPIBundle:Page:single.xml.twig', array('page' => $r));
                $response->headers->set('Content-Type', 'application/xml');
                return $response;
                break;
            default:
                return $this->render('ChasAPIBundle:Page:single.html.twig', array('page' => $r));
                break;
        }

    }
    
    private function pageSingle_json($r){
        $return = array();
        
        $return['page'] = $r->getPage();
        $return['email'] = $r->getEmail();
        $return['phonenumber'] = $r->getPhonenumber();
        $return['address'] = $r->getAddress();

        return json_encode($return);
    }


}
