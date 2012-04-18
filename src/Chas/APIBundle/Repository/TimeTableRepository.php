<?php

namespace Chas\APIBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TimeTableRepository
 */
class TimeTableRepository extends EntityRepository
{
    public function findTimeTablesOrderedById(){
        return $this->getEntityManager()
            ->createQuery('SELECT tt FROM ChasAPIBundle:TimeTable tt ORDER BY tt.id ASC')
            ->getResult();
    } 
    
    public function findStopsOrderedById(){
        return $this->getEntityManager()
            ->createQuery('SELECT tts FROM ChasAPIBundle:TimeTableStops tts ORDER BY tts.id ASC')
            ->getResult();
    } 
   
    public function findTripsOrderedById(){
        return $this->getEntityManager()
            ->createQuery('SELECT ttt FROM ChasAPIBundle:TimeTableTrips ttt ORDER BY ttt.id ASC')
            ->getResult();
    } 
    public function findStopsByTrip($trip, $titles){

        $tmp = $this->getEntityManager()
            ->createQuery('SELECT ttr FROM ChasAPIBundle:TimeTableRoute ttr
                WHERE ttr.trips = :trip
                AND ttr.title IN (:titles)
                ORDER BY ttr.title ASC, ttr.routeorder ASC')
                ->setParameter('trip', $trip)
                ->setParameter('titles', $titles)->getResult();
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

        if (!is_object($to) || !is_object($from)) {
            #throw new Exception('Stop is Missing');
        }

        $r = $this->getEntityManager()
            ->createQuery('SELECT ttr, ttt FROM ChasAPIBundle:TimeTableRoute ttr
                JOIN ttr.trips ttt
                WHERE :redday = ttt.redday
                AND :when >= ttt.availablefrom
                AND :when <= ttt.availableto
                AND ttt.id = ttr.trips
                AND ttr.stops IN (:from, :to)
                AND ttr.routeorder < (SELECT MAX(ttrsub.routeorder) FROM ChasAPIBundle:TimeTableRoute ttrsub
                    WHERE ttrsub.stops = :to
                    AND ttrsub.trips = ttr.trips
                )
                GROUP BY ttr.trips
                ORDER BY ttr.title ASC
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

        $titles = array();
        for($i=0;$i<count($routes);$i++){
            $title = $routes[$i]->getTitle();
            if (array_search($title, $titles) === false){
                $titles[] = $title;
            }
        }

        $return = null;
        for($i=0;$i<count($routes);$i++){
            $cleaned = $this->findStopsByTrip($routes[$i]->getTrips()->getId(), $titles);
            $tmp['stops'] = $cleaned;
            $tmp['routes'] = $routes[$i];
            $return[] = $tmp;
        }

        return $return;

    }

    private function cleanStops($stops, $from, $to)
    {
        $cleaned;
        $status = 0;
        foreach ($stops as $stop){

            $tmp;

            // Found From
            if ($to->getId() == $stop->getId() && 0 == $status){
                $status = 1;
            }
            
            // Found another From, start over!
            if ($from->getId() == $stop->getId() && 1 == $status){
                unset($tmp);
            }
            
            // Found To
            if ($to->getId() == $stop->getId() && 1 == $status){
                $status = 2;
            }

            if (1 == $status){
                $tmp[] = $stop;
            }

        }


        return $cleaned;
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
