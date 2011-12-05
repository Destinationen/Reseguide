<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chas\APIBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function menuAction($page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery(
            'SELECT p FROM ChasAPIBundle:Page p'
        );
        $r = $query->getResult();
        
        return $this->render('ChasAdminBundle:Page:menu.html.twig', array('currentpage' => $page, 'pages' => $r));
    }
    
    public function getPageAction($page, $form)
    {
        switch($page)
        {
            case 'welcome':
                return $this->welcome();
                break;
            case 'newPage':
                return $this->newPage($form);
                break;
            case 'updatePage':
                return $this->updatePage($form);
                break;
            default:
                return $this->welcome();
        }
    }

    private function welcome()
    {
        return $this->render('ChasAdminBundle:Page:welcome.html.twig');
    }

    public function newPage($form)
    {
        return $this->render('ChasAdminBundle:Page:new.html.twig', array('form' => $form));
    }

    public function updatePage($form)
    {
        return $this->render('ChasAdminBundle:Page:update.html.twig', array('form' => $form));
    }

}
