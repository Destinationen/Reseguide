<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Chas\APIBundle\Entity\TimeTable;
use Chas\APIBundle\Entity\TimeTableTrips;

use DateTime;

class LoadTimeTableTripData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Load dependencies
         */
        $tt_results = $manager->getRepository('ChasAPIBundle:TimeTable')
            ->findByName('Skidbussen');
        $tt = $tt_results[0];
        
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

        // Mon-Sat, no red days
        $ttt_mon2sat = new TimeTableTrips();
        $ttt_mon2sat->setDays(63);
        $ttt_mon2sat->setRedday(0);
        $ttt_mon2sat->setAvailablefrom($seasonStartDate);
        $ttt_mon2sat->setAvailableto($seasonEndDate);
        $ttt_mon2sat->setTimetable($tt);

        /**
         * Sundays
         */
        $ttt_sun = new TimeTableTrips();
        $ttt_sun->setDays(64);
        $ttt_sun->setRedday(1);
        $ttt_sun->setAvailablefrom($seasonStartDate);
        $ttt_sun->setAvailableto($seasonEndDate);
        $ttt_sun->setTimetable($tt);       


        // Sunday Exceptions 1
        $afDateSunException1 = new DateTime();
        $afDateSunException1->setDate(2011,12,25);
        
        $atDateSunException1 = new DateTime();
        $atDateSunException1->setDate(2012,1,8);
        
        /**
         * Sunday Exceptions 1
         */
        $ttt_sunExc1 = new TimeTableTrips();
        $ttt_sunExc1->setDays(64);
        $ttt_sunExc1->setRedday(1);
        $ttt_sunExc1->setAvailablefrom($afDateSunException1);
        $ttt_sunExc1->setAvailableto($atDateSunException1);
        $ttt_sunExc1->setTimetable($tt);


        // Sunday Exceptions 2
        $afDateSunException2 = new DateTime();
        $afDateSunException2->setDate(2012,2,19);
        
        $atDateSunException2 = new DateTime();
        $atDateSunException2->setDate(2012,4,15);

        /**
         * Sunday Exceptions 2
         */
        $ttt_sunExc2 = new TimeTableTrips();
        $ttt_sunExc2->setDays(64);
        $ttt_sunExc2->setRedday(1);
        $ttt_sunExc2->setAvailablefrom($afDateSunException2);
        $ttt_sunExc2->setAvailableto($atDateSunException2);
        $ttt_sunExc2->setTimetable($tt);
        
        /**
         * Persisting
         */

        // Persist the Trips
        $manager->persist($ttt_everyday);
        $manager->persist($ttt_mon2sat);
        $manager->persist($ttt_sun);
        $manager->persist($ttt_sunExc1);
        $manager->persist($ttt_sunExc2);   

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
