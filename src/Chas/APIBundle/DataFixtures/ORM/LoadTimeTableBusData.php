<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\APIBundle\Entity\TimeTable;
use Chas\APIBundle\Entity\TimeTableTrips;
use Chas\APIBundle\Entity\TimeTableRoute;
use Chas\APIBundle\Entity\TimeTableStops;
use DateTime;

class LoadTimeTableBusData implements FixtureInterface
{
    public function load($manager)
    {
        
        
        // Define The TimeTable
        $tt = new TimeTable();
        $tt->setName('Tänndalslinjen');
        $tt->setType('bus');


        // Define all the stops
        $tts_2 = new TimeTableStops();
        $tts_2->setTitle('Shell');
        $tts_2->setLatitude('12.531500');
        $tts_2->setLongitude('62.548973');

        $tts_3 = new TimeTableStops();
        $tts_3->setTitle('OK');
        $tts_3->setLatitude('12.518191');
        $tts_3->setLongitude('62.549969');

        $tts_4 = new TimeTableStops();
        $tts_4->setTitle('Grönländaren');
        $tts_4->setLatitude('12.469139');
        $tts_4->setLongitude('62.549969');

        $tts_5 = new TimeTableStops();
        $tts_5->setTitle('Fjällkällan');
        $tts_5->setLatitude('12.469139');
        $tts_5->setLongitude('62.543030');

        $tts_7 = new TimeTableStops();
        $tts_7->setTitle('Skarvruet');
        $tts_7->setLatitude('12.413767');
        $tts_7->setLongitude('62.537395');

        $tts_8 = new TimeTableStops();
        $tts_8->setTitle('Skarvrusätern');
        $tts_8->setLatitude('12.396583');
        $tts_8->setLongitude('62.538914');

        /**
         * Define the Trips
         */
        // Every day
        $seasonStartDate = new DateTime();
        $seasonStartDate->setDate(2011,12,25);
        
        $seasonEndDate = new DateTime();
        $seasonEndDate->setDate(2012,04,27);

        $ttt_everyday = new TimeTableTrips();
        $ttt_everyday->setDays(127);
        $ttt_everyday->setRedday(0);
        $ttt_everyday->setAvailablefrom($seasonStartDate);
        $ttt_everyday->setAvailableto($seasonEndDate);
        $ttt_everyday->setTimetable($tt);

        /*
        // Mon-Sat, no red days
        $ttt_mon2sat = new TimeTableTrips();
        $ttt_mon2sat->setDays(63);
        $ttt_mon2sat->setRedday(0);
        $ttt_mon2sat->setAvailablefrom($seasonStartDate);
        $ttt_mon2sat->setAvailableto($seasonEndDate);
        $ttt_mon2sat->setTimetable($tt);
        */

        /**
         * Sundays
         */
        /*
        $ttt_sun = new TimeTableTrips();
        $ttt_sun->setDays(64);
        $ttt_sun->setRedday(1);
        $ttt_sun->setAvailablefrom($afDate);
        $ttt_sun->setAvailableto($atDate);
        $ttt_sun->setTimetable($tt);       
        */

        /*
        // Sunday Exceptions
        $afDateSunException1 = new DateTime();
        $afDateSunException1->setDate(2011,12,25);
        
        $atDateSunException1 = new DateTime();
        $atDateSunException1->setDate(2012,1,8);
        */
        
        /**
         * Sunday Exceptions 1
         */
        /*
        $ttt_sunExc1 = new TimeTableTrips();
        $ttt_sunExc1->setDays(64);
        $ttt_sunExc1->setRedday(1);
        $ttt_sunExc1->setAvailablefrom($afDateSunException1);
        $ttt_sunExc1->setAvailableto($atDateSunException1);
        $ttt_sunExc1->setTimetable($tt);
         */
        
        /*
        // Sunday Exceptions
        $afDateSunException2 = new DateTime();
        $afDateSunException2->setDate(2012,2,19);
        
        $atDateSunException2 = new DateTime();
        $atDateSunException2->setDate(2012,4,15);
        */

        /**
         * Sunday Exceptions 2
         */
        /*
        $ttt_sunExc2 = new TimeTableTrips();
        $ttt_sunExc2->setDays(64);
        $ttt_sunExc2->setRedday(1);
        $ttt_sunExc2->setAvailablefrom($afDateSunException2);
        $ttt_sunExc2->setAvailableto($atDateSunException2);
        $ttt_sunExc2->setTimetable($tt);
        */

        /*
        $tts2 = new timetablestops();
        $tts2->setstop('Funäsdalens Bussplan');
        $ddate2 = new datetime();
        $ddate2->settime(14,15,0);
        $tts2->setdeparture($ddate2);
        $tts2->setLatitude("62.545376");
        $tts2->setLongitude("12.544772");
        $tts2->setTimetabletrip($ttt_mon2sat);

        $tts3 = new timetablestops();
        $tts3->setstop('Funäsdalens Bussplan');
        $ddate3 = new datetime();
        $ddate3->settime(15,40,0);
        $tts3->setdeparture($ddate3);
        $tts3->setLatitude("62.545376");
        $tts3->setLongitude("12.544772");
        $tts3->setTimetabletrip($ttt_mon2sat);
         */

        /*
        // Sundays
        $tts4 = new timetablestops();
        $tts4->setstop('Funäsdalens Bussplan');
        $ddate4 = new datetime();
        $ddate4->settime(15,30,0);
        $tts4->setdeparture($ddate4);
        $tts4->setLatitude("62.545376");
        $tts4->setLongitude("12.544772");
        $tts4->setTimetabletrip($ttt_sun);
        */

        /*
        // Sunday exceptions
        $tts5 = new timetablestops();
        $tts5->setstop('Funäsdalens Bussplan');
        $ddate5 = new datetime();
        $ddate5->settime(14,30,0);
        $tts5->setdeparture($ddate5);
        $tts5->setLatitude("62.545376");
        $tts5->setLongitude("12.544772");
        $tts5->setTimetabletrip($ttt_sunExc1);


        $tts6 = new timetablestops();
        $tts6->setstop('Funäsdalens Bussplan');
        $ddate6 = new datetime();
        $ddate6->settime(14,30,0);
        $tts6->setdeparture($ddate6);
        $tts6->setLatitude("62.545376");
        $tts6->setLongitude("12.544772");
        $tts6->setTimetabletrip($ttt_sunExc2);
         */



        /**
         * Define the Route
         */

        // Shell
        $route_2 = new TimeTableRoute();
        $route_2->setRouteorder(2);
        $ttr_2_departure = new datetime();
        $ttr_2_departure->settime(14,16,0);
        $route_2->setDeparture($ttr_2_departure);
        $route_2->addStops($tts_2);
        $route_2->addTrips($ttt_everyday);
        
        // OK
        $route_3 = new TimeTableRoute();
        $route_3->setRouteorder(3);
        $ttr_3_departure = new datetime();
        $ttr_3_departure->settime(14,18,0);
        $route_3->setDeparture($ttr_3_departure);
        $route_3->addStops($tts_3);
        $route_3->addTrips($ttt_everyday);
        
        // Grönländaren
        $route_4 = new TimeTableRoute();
        $route_4->setRouteorder(4);
        $ttr_4_departure = new datetime();
        $ttr_4_departure->settime(14,20,0);
        $route_4->setDeparture($ttr_4_departure);
        $route_4->addStops($tts_4);
        $route_4->addTrips($ttt_everyday);






        /**
         * Persisting
         */

        // Persist the TimeTable
        $manager->persist($tt);
        
        // Persist the stops
        $manager->persist($tts_2);
        $manager->persist($tts_3);
        $manager->persist($tts_4);
        $manager->persist($tts_5);
        $manager->persist($tts_7);
        $manager->persist($tts_8);

        // Persist the Trips
        $manager->persist($ttt_everyday);
        //$manager->persist($ttt_mon2sat);
        //$manager->persist($ttt_sun);
        //$manager->persist($ttt_sunExc1);
        //$manager->persist($ttt_sunExc2);   
        
        // Persist the Routes
        $manager->persist($route_2);
        $manager->persist($route_3);
        $manager->persist($route_4);

        $manager->flush();
    }
}
