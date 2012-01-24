<?php

namespace Chas\APIBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TimeTableRepository
 */
class TimeTableRepository extends EntityRepository
{
    
    public function findStopsByTrip($trip){

        $tmp = $this->getEntityManager()
            ->createQuery('SELECT ttr FROM ChasAPIBundle:TimeTableRoute ttr
                WHERE ttr.trips = :trip
                ORDER BY ttr.routeorder ASC')
                ->setParameter('trip', $trip)->getResult();
        $return = $tmp;
        //$return = null;
        /*
        for ($u=0;$u<count($tmp);$u++){
            $return[] = $tmp[$u]->getStops();
        }
         */
        return $return; 
    }

    public function findTrip($from, $to, $when)
    {
        $redday = $this->getEntityManager()
            ->getRepository('ChasAPIBundle:RedDay')
            ->findByDay($when);
        $rd = 0;
        if ($redday){
            $rd = 1;
        }
        
        $r = $this->getEntityManager()
            ->createQuery('SELECT ttr, ttt FROM ChasAPIBundle:TimeTableRoute ttr
            JOIN ttr.trips ttt
            WHERE :redday = ttt.redday
            AND :when >= ttt.availablefrom
            AND :when <= ttt.availableto
            AND ttt.id = ttr.trips
            AND ttr.stops IN (:from, :to)
            AND ttr.routeorder < (SELECT ttrsub.routeorder FROM ChasAPIBundle:TimeTableRoute ttrsub
                WHERE ttrsub.stops = :to
                AND ttrsub.trips = ttr.trips)
            ')
            ->setParameter('when', $when)
            ->setParameter('redday', $rd )
            ->setParameter('from', $from->getId())
            ->setParameter('to', $to->getId())
            ;
        
        $routes;

        try {
            $routes = $r->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            $routes = null;
        }

        $return = null;
        for($i=0;$i<count($routes);$i++){
            $tmp['stops'] = $this->findStopsByTrip($routes[$i]->getTrips()->getId());
            $tmp['routes'] = $routes[$i];
            $return[] = $tmp;
        }

        return $return;

    }
}
