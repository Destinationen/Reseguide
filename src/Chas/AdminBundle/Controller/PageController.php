<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chas\APIBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    
    public function pageAction()
    {
        $menus = $this->getMenu();
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('currentpage' => 'welcome', 'form' => null, 'menus' => $menus));
    }
   
    public function pageNewAction(Request $request)
    {
        
        $p = new Page();
        $p->setPage('Page Title');
        $p->setPhonenumber('0684-123 45');
        $p->setEmail('hello@domain.nu');
        $p->setAddress('Rörosvägen 124, 840 96 Funäsdalen');

        $form = $this->createFormBuilder($p)
            ->add('page','text')
            ->add('phonenumber','text')
            ->add('email','email')
            ->add('address','textarea')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($p);
                $em->flush();

                return $this->redirect($this->generateUrl('ChasAdminBundle_page'));
            }
        }
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('currentpage' => 'new', 'form' => $form->createView(), 'menus' => $this->getMenu()));
    }

    public function pageUpdateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $p = $em->getRepository('ChasAPIBundle:Page')->find($id);
        
        if (!$p && $request->getMethod() != 'POST'){
            throw $this->createNotFoundException('No page found for id ' . $id);
        }
        
        $form = $this->createFormBuilder($p)
            ->add('page','text')
            ->add('phonenumber','text')
            ->add('email','email')
            ->add('address','textarea')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                $em->flush();

                return $this->redirect($this->generateUrl('ChasAdminBundle_page'));
            }
        }
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('currentpage' => 'update','form' => $form->createView(), 'menus' => $this->getMenu()));
    }
    
    public function getPageAction($currentpage, $form, $id = null)
    {
        switch($currentpage)
        {
            case 'welcome':
                return $this->welcome();
                break;
            case 'new':
                return $this->newPage($form);
                break;
            case 'update':
                return $this->updatePage($form, $id);
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

    public function updatePage($form, $id)
    {
        return $this->render('ChasAdminBundle:Page:update.html.twig', array('form' => $form, 'id' => $id));
    }

    public function getMenu()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery(
            'SELECT p FROM ChasAPIBundle:Page p'
        );
        $r = $query->getResult();
        
        $menu = array();
        
        for ($i=0;$i<count($r);$i++){
            $banners_item['path'] = $this->generateUrl('ChasAdminBundle_page_update', array('id' => $r[$i]->getId() ));
            $banners_item['name'] = $r[$i]->getPage();
            $menu[] = $banners_item;
        }

        $new_item['path'] = $this->generateUrl('ChasAdminBundle_page_new');
        $new_item['name'] = 'New';
        $menu[] = $new_item;

        return $menu;
    }
    

}
