<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Chas\APIBundle\Entity\Page;
use Chas\BannerBundle\Entity\Banner;

/**
 * @Route("/secured")
 */
class SecuredController extends Controller
{
    /**
     * @Route("/login", name="_login")
     * @Template()
     */
    public function loginAction()
    {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        
        return array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }
    
    /**
     * @Route("/logout", name="_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/", name="_security_dashboard")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function dashboardAction()
    {
        return $this->render('ChasAdminBundle:Admin:index.html.twig');
    }

    /**
     * @Route("/carpool", name="_security_carpool")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function carpoolAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:CarPool')
            ->findAllOrderedByDate();

        return $this->render('ChasAdminBundle:Admin:carpool.html.twig', array('resources' => $r));
    }

    /**
     * @Route("/pages", name="_security_page")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function pageAction()
    {
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('page' => 'welcome', 'form' => null));
    }
   
    /**
     * @Route("/pages/new", name="_security_page_new")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $p = new Page();
        $p->setPage('taxi');
        $p->setPhonenumber('0684-155 80');
        $p->setEmail('hello@taxi.se');
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

                return $this->redirect($this->generateUrl('_security_page'));
            }
        }
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('page' => 'newPage', 'form' => $form->createView()));
    }

    /**
     * @Route("/pages/{id}", name="_security_page_update")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
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

                return $this->redirect($this->generateUrl('_security_page'));
            }
        }
        return $this->render('ChasAdminBundle:Admin:pages.html.twig', array('page' => 'updatePage','form' => $form->createView()));
    }

    /**
     * @Route("/banner", name="_security_banner")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function bannerAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasBannerBundle:Banner')->findAll();

        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('page' => 'welcome','banners' => $b, 'form' => null));

    }
    
    /**
     * @Route("/banner/new", name="_security_banner_new")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function bannerNewAction(Request $request)
    {
        $b = new Banner();
        $b->setName('Banner Name');
        $b->setUrl('http://example.com');
        $b->setClicks(0);

        $form = $this->createFormBuilder($b)
            ->add('name','text')
            ->add('url','text')
            ->add('clicks','hidden')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($b);
                $em->flush();

                return $this->redirect($this->generateUrl('_security_banner'));
            }
        }

        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('page' => 'new', 'form' => $form->createView()));
    }

    /**
     * @Route("/banner/{id}", name="_security_banner_update")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function bannerUpdateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasBannerBundle:Banner')->find($id);
        
        if (!$b && $request->getMethod() != 'POST'){
            throw $this->createNotFoundException('No banner found for id ' . $id);
        }
        
        $form = $this->createFormBuilder($b)
            ->add('name','text')
            ->add('url','text')
            ->getForm();
        
        if ($request->getMethod() == 'POST'){
            $form->bindRequest($request);

            if ($form->isValid()){
                $em->flush();

                return $this->redirect($this->generateUrl('_security_banner'));
            }
        }

        return $this->render('ChasAdminBundle:Admin:banner.html.twig', array('page' => 'update', 'form' => $form->createView()));
    }

}
