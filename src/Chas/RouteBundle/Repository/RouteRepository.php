<?php

namespace Chas\RouteBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RouteRepository
 *
 */
class RouteRepository extends EntityRepository
{

    public function findStops()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT r
                           FROM ChasRouteBundle:Route r
                           WHERE r.isStop = 1
                           ');
        
        try {
            $r = $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            $r = null;
        }

        return $r;
    }

    public function findRoutes()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT r
                           FROM ChasRouteBundle:Route r
                           WHERE r.isStop = 0 
                           ');
        
        try {
            $r = $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            $r = null;
        }

        return $r;
    }
}
