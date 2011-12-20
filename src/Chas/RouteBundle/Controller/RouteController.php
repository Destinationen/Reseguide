<?php

namespace Chas\RouteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Chas\RouteBundle\Entity\Route;
use Chas\RouteBundle\Entity\RouteLocation;

class RouteController extends Controller
{
    
    public function allAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $emr = $em->getRepository('ChasRouteBundle:Route');
        $stops = $emr->findStops();
        $routes = $emr->findRoutes();
        
        $extension = $request->get('_format');
        $e = null;
        if (null !== $extension && $request->getMimeType($extension)){
            $e = $request->getMimeType($extension);
        }
        
        switch ($e){
            case 'application/json':
                $response = new Response($this->all2json($stops, $routes));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
                break;
            case 'text/xml':
                $response = $this->render('ChasRouteBundle:Route:all.xml.twig', array('stops' => $stops, 'routes' => $routes));
                $response->headers->set('Content-Type', 'application/xml');
                return $response;
                break;
            default:
                return $this->render('ChasRouteBundle:Route:index.html.twig', array('resources' => $r));
                break;
        }


    }
    
    private function all2json($stops, $routes){
        $return = array();

        foreach ($stops as &$stop){
            $tmp['id'] = $stop->getId();
            $tmp['name'] = $stop->getName();
            $tmp['description'] = $stop->getDescription();
            
            $locations = $stop->getRouteLocations();
            foreach ($locations as &$location){
                $tmp['lat'] = $location->getLat();
                $tmp['lon'] = $location->getLon();
            }

            $return['stops'][] = $tmp;
        }
        unset($tmp);
        foreach ($routes as &$route){
            $tmp['id'] = $route->getId();
            $tmp['name'] = $route->getName();
            $tmp['description'] = $route->getDescription();
            
            $locations = $route->getRouteLocations();
            foreach ($locations as &$location){
                $tmp_loc['lat'] = $location->getLat();
                $tmp_loc['lon'] = $location->getLon();
                $tmp['locations'][] = $tmp_loc;
            }

            $return['routes'][] = $tmp;
        }

        return json_encode($return);
    }  
    
    public function routeAction()
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        $emr = $em->getRepository('ChasRouteBundle:Route');
        $stops = $emr->findStops();
        $routes = $emr->findRoutes();

        $r = new Route();

        $form = $this->createFormBuilder($r)
            ->add('file')
            ->getForm();

        return $this->render('ChasRouteBundle:Route:index.html.twig', array('stops' => $stops, 'routes' => $routes, 'form' => $form->createView()));
    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $r = new Route();

        $form = $this->createFormBuilder($r)
            ->add('file')
            ->getForm();

        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                //$em = $this->getDoctrine()->getEntityManager();
                //return new Response($r->file);

                $this->parseAndPersist($r->file);

                //$em->persist($b);
                //$em->flush();
            }
        }

        //return new Response('nee');
        return $this->redirect($this->generateUrl('ChasAdminBundle_route'));

    }

    public function removeAction($id)
    {
        /*
           $em = $this->getDoctrine()->getEntityManager();
           $b = $em->getRepository('ChasRouteBundle:Route')->find($id);

           $em->remove($b);
           $em->flush();
         */
        return $this->redirect($this->generateUrl('ChasAdminBundle_route'));
    }

    private function parseAndPersist($file){
        
        $em = $this->getDoctrine()->getEntityManager();

        $Doc = new \DOMDocument();
        $Doc->preserveWhiteSpace = false;

        $Doc->load($file);

        $xpath = new \DOMXPath($Doc);

        $xpath->registerNamespace('kml', 'http://earth.google.com/kml/2.2'); 

            $nodeList = $xpath->query('//kml:Document/kml:Placemark/.');

        if (!is_null($nodeList)) {
            $return = array();

            for ($i=0; $i < $nodeList->length; $i++) {
                
                $r = new Route();

                // Get the names, it should always be present
                $nameNodes = $xpath->query('kml:name/.', $nodeList->item($i));
                $nodes = $nameNodes->item(0)->childNodes;
                $r->setName($nodes->item(0)->nodeValue);

                // Get the description, it should always be present, but can be empty
                $descriptionNodes = $xpath->query('kml:description/.', $nodeList->item($i));
                $nodes = $descriptionNodes->item(0)->childNodes;
                $r->setDescription($nodes->item(0)->nodeValue);
                
                // End of all things Route
                $em->persist($r);
                

                // Start adding this Routes Locations

                // Get the LineString, if there is one
                $lineNodes = $xpath->query('kml:LineString/kml:coordinates/.', $nodeList->item($i));
                if ($lineNodes->length){
                    
                    $nodes = $lineNodes->item(0)->childNodes;

                    $tmp_c = array_map('trim', explode("\n", $nodes->item(0)->nodeValue));
                    $c=0;
                    for ($u=0;$u<count($tmp_c);$u++){
                        if (strlen($tmp_c[$u])){
                            $tmp = array_map('trim', explode(',', $tmp_c[$u]));

                            $rl = new RouteLocation();
                            $rl->setRoute($r);
                            $rl->setLat($tmp[0]);
                            $rl->setLon($tmp[1]);
                            
                            $em->persist($rl);
                        }
                    }
                    $r->setIsStop(0);
                }

                // Get the Point, if there is one
                $pointNodes = $xpath->query('kml:Point/kml:coordinates/.', $nodeList->item($i));
                if ($pointNodes->length){
                    $nodes = $pointNodes->item(0)->childNodes;
                    $tmp = array_map('trim', explode(',', $nodes->item(0)->nodeValue));
                    
                    $rl = new RouteLocation();
                    $rl->setRoute($r);
                    $rl->setLat($tmp[0]);
                    $rl->setLon($tmp[1]);
                            
                    $em->persist($rl);

                    $r->setIsStop(1);
                }
                
                unset($r);
            }

            $em->flush();

        }

    }
}
