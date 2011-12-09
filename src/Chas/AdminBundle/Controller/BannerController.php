<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Chas\BannerBundle\Entity\Banner;
use Symfony\Component\HttpFoundation\Request;

class BannerController extends Controller
{
    public function bannerAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasBannerBundle:Banner')->findAll();
        
        $menus = $this->getMenu();

        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('currentpage' => 'welcome','banners' => $b, 'form' => null, 'menus' => $menus));

    }
    
    public function bannerNewAction(Request $request)
    {
        $b = new Banner();
        $b->setName('Banner Name');
        $b->setUrl('http://example.com');
        $b->setClicks(0);
        
        $menus = $this->getMenu();

        $form = $this->createFormBuilder($b)
            ->add('name','text')
            ->add('url','text')
            ->add('pubdate', 'date')
            ->add('unpubdate', 'date')
            ->add('file')
            ->add('clicks','hidden')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();

                $b->upload();

                $em->persist($b);
                $em->flush();

                return $this->redirect($this->generateUrl('ChasAdminBundle_banner'));
            }
        }

        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('currentpage' => 'new', 'form' => $form->createView(), 'menus' => $menus));
    }

    public function bannerUpdateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasBannerBundle:Banner')->find($id);
        
        $menus = $this->getMenu();

        if (!$b && $request->getMethod() != 'POST'){
            throw $this->createNotFoundException('No banner found for id ' . $id);
        }
        
        $form = $this->createFormBuilder($b)
            ->add('name','text')
            ->add('url','text')
            ->add('pubdate', 'date')
            ->add('unpubdate', 'date')
            ->add('file')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                
                $b->upload();

                $em->flush();

                return $this->redirect($this->generateUrl('ChasAdminBundle_banner'));
            }
        }
        
        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('currentpage' => 'update', 'form' => $form->createView(), 'id' => $id, 'menus' => $menus));
    }
    
    public function bannerRemoveAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasBannerBundle:Banner')->find($id);
        
        $em->remove($b);
        $em->flush();

        return $this->redirect($this->generateUrl('ChasAdminBundle_banner'));

    }


    
    
    
    
    public function getPageAction($currentpage, $form, $id = null)
    {
        switch($currentpage)
        {
            case 'welcome':
                return $this->welcome();
                break;
            case 'new':
                return $this->newBanner($form);
                break;
            case 'update':
                return $this->updateBanner($form, $id);
                break;
        }
    }

    private function welcome()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banners = $em->getRepository('ChasBannerBundle:Banner')
            ->findAll();
        return $this->render('ChasAdminBundle:Banner:banners.html.twig', array('banners' => $banners, 'page' => 'welcome'));
    }

    private function newBanner($form)
    {
        return $this->render('ChasAdminBundle:Banner:new.html.twig', array('form' => $form));
    }

    private function updateBanner($form, $id)
    {
        return $this->render('ChasAdminBundle:Banner:update.html.twig', array('form' => $form, 'id' => $id));
    }

    public function getMenu()
    {
        $menu = array();

        $banners_item['path'] = $this->generateUrl('ChasAdminBundle_banner');
        $banners_item['name'] = 'Banners';
        $menu[] = $banners_item;

        $new_item['path'] = $this->generateUrl('ChasAdminBundle_banner_new');
        $new_item['name'] = 'New';
        $menu[] = $new_item;

        return $menu;
    }

}
