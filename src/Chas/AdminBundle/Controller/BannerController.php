<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chas\BannerBundle\Entity\Banner;

class BannerController extends Controller
{
    public function getPageAction($page, $form)
    {
        switch($page)
        {
            case 'welcome':
                return $this->welcome();
                break;
            case 'new':
                return $this->newBanner($form);
                break;
            case 'update':
                return $this->updateBanner($form);
                break;
        }
    }

    public function welcome()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banners = $em->getRepository('ChasBannerBundle:Banner')
            ->findAll();
        
        return $this->render('ChasAdminBundle:Banner:banners.html.twig', array('banners' => $banners));
    }

    public function newBanner($form)
    {
        return $this->render('ChasAdminBundle:Banner:new.html.twig', array('form' => $form));
    }

    public function updateBanner($form)
    {
        return $this->render('ChasAdminBundle:Banner:update.html.twig', array('form' => $form));
    }
}
