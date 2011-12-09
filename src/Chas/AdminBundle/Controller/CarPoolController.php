<?php

namespace Chas\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CarPoolController extends Controller
{
    public function carpoolAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $r = $em->getRepository('ChasAPIBundle:CarPool')
            ->findAllOrderedByDate();

        return $this->render('ChasAdminBundle:Admin:carpool.html.twig', array('resources' => $r));
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $b = $em->getRepository('ChasAPIBundle:CarPool')->find($id);
        
        $em->remove($b);
        $em->flush();

        return $this->redirect($this->generateUrl('ChasAdminBundle_carpool'));

    }



}
