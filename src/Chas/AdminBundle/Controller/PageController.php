<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chas\APIBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function menuAction($page)
    {
        return $this->render('ChasAdminBundle:Page:menu.html.twig', array('page' => $page));
    }
    
    public function getPageAction($page, $form)
    {
        switch($page)
        {
            case 'taxi':
                return $this->taxi();
                break;
            case 'carrental':
                return $this->carRental();
                break;
            case 'newPage':
                return $this->newPage($form);
                break;
            default:
                return $this->taxi();
        }
    }

    private function taxi()
    {
        return $this->render('ChasAdminBundle:Page:taxi.html.twig');
    }

    private function carRental()
    {
        return $this->render('ChasAdminBundle:Page:carRental.html.twig');
    }

    public function newPage($form)
    {
        //return $this->render('ChasAdminBundle:Page:carRental.html.twig');
        return $this->render('ChasAdminBundle:Page:new.html.twig', array('form' => $form));
        
    }
}
