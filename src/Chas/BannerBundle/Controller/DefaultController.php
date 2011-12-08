<?php

namespace Chas\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Chas\BannerBundle\Entity\Banner;

class DefaultController extends Controller
{
    
    public function allAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banners = $em->getRepository('ChasBannerBundle:Banner')->findPublished();
        
        $base_path = $this->get('router')->generate('ChasAdminBundle_homepage', array(), true);

        $return = array();
        for ($i=0;$i<count($banners);$i++){
            $tmp_return = array();
            $tmp_return['url'] = $base_path . $banners[$i]->getId();
            $tmp_return['image'] = $banners[$i]->getWebPath();
            $return[] = $tmp_return;
        }
        
        $response = new Response(json_encode(array('banners' => $return)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
        //return $this->render('ChasBannerBundle:Default:index.html.twig', array('banners' => $banners));
    }

    public function redirectAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        try {
            $b = $em->getRepository('ChasBannerBundle:Banner')->findOneById($id);
        } catch (\Doctrine\Orm\NoResultException $e) {
            $b = null;
        }
        if ($b){
            
            $b->setClicks( $b->getClicks()+1 );
            $em->persist($b);
            $em->flush();
            
            return new RedirectResponse($b->getUrl());
        } else {
            return new Response('<h1>Ooops! We could not find the URL for this banner!</h1>');
        }
    }
}
