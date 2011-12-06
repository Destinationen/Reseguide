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
        /*
        $ac = $em->getRepository('ChasAPIBundle:APICache')
            ->findByRequest($requestHash);
        if (!$ac){
            //No one has requested this before, lets get the response and cache it here.
            echo $requestHash . ' not found in the apicache table<br />';    
            
            $request = Request::createFromGlobals(); 
            $zHttpConf = array(
                'maxredirects'       => 0,
                'timeout'            => 30
            );
            $client = new \Zend_Http_Client($request->getPathInfo(), $zHttpConf);
            $responce = $client->request();

            var_dump($responce);
        }
        */
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

    public function carpoolAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:CarPool')
            ->findAllOrderedByDate();

        return $this->render('ChasAPIBundle:CarPool:index.html.twig', array('resources' => $r));
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

        $yr = 'http://api.yr.no/weatherapi/locationforecast/1.8/?lat='.$lat.';lon='.$lon.';msl=583';

        $requestHash = RequestHash::getHash($yr);
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $ac = $em->getRepository('ChasAPIBundle:APICache')
            ->findOneByRequest($requestHash);
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
}
