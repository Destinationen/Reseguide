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

    public function findActiveStopsByResource($resource){
        /*
        // This was suppose to get the currently used stops, but I could not get it to work...
        $sql = 'SELECT ttr DISTINCT ttr AS stops FROM ChasAPIBundle:TimeTableRoute ttr
                INNER JOIN ttr.trips ttt
                INNER JOIN ttt.timetable tt
                INNER JOIN ttr.stops tts
                WHERE ttt.id = ttr.trips
                AND ttt.timetable = tt.id
                AND tt.type = :type';
         */

        // Right now there is only bus stops so...
        $sql = 'SELECT tts FROM ChasAPIBundle:TimeTableStops tts';

        $r = $this->getEntityManager()
            ->createQuery($sql);
                //->setParameter('type', $resource);

        try {
            return $r->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }

    public function findByTimetable($ttid){

        $r = $this->getEntityManager()
            ->createQuery('SELECT ttr, ttt FROM ChasAPIBundle:TimeTableRoute ttr
                JOIN ttr.trips ttt
                WHERE ttt.timetable = :ttid
                AND ttt.id = ttr.trips')
            ->setParameter('ttid', $ttid);

        try {
            return $r->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}
