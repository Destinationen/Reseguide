<?php

namespace Chas\APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
        $r = $em->getRepository('ChasAPIBundle:TimeTable')
            ->findByType($resource);

        return $this->render('ChasAPIBundle:Default:index.html.twig', array('resources' => $r, 'r' => $resource));
        
    }

    public function singleAction($resource, $id)
    {
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
}
