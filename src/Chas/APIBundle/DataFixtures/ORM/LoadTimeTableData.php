<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\APIBundle\Entity\TimeTable;
use Chas\APIBundle\Entity\TimeTableStops;
use DateTime;

class LoadTimeTableData implements FixtureInterface
{
    public function load($manager)
    {
        $tt = new TimeTable();
        $tt->setName('Mora-Sveg');
        $tt->setType('train');

        $afDate = new DateTime();
        $afDate->setDate(2012,6,4);
        
        $atDate = new DateTime();
        $atDate->setDate(2012,6,21);


        $tts = new TimeTableStops();
        $tts->setStop('Mora Strand');
        $dDate = new DateTime();
        $dDate->setTime(14,35,0);
        $tts->setDeparture($dDate);
        $tts->setAvailablefrom($afDate);
        $tts->setAvailableto($atDate);
        $tts->setTimetable($tt);
        

        $tts2 = new timetablestops();
        $tts2->setstop('Mora');
        $ddate2 = new datetime();
        $ddate2->settime(14,40,0);
        $tts2->setdeparture($ddate2);
        $tts2->setavailablefrom($afDate);
        $tts2->setavailableto($atDate);
        $tts2->settimetable($tt);

        $tts3 = new timetablestops();
        $tts3->setstop('Orsa');
        $ddate3 = new datetime();
        $ddate3->settime(14,55,0);
        $tts3->setdeparture($ddate3);
        $tts3->setavailablefrom($afDate);
        $tts3->setavailableto($atDate);
        $tts3->settimetable($tt);
 
        $tts4 = new timetablestops();
        $tts4->setstop('Björnidet');
        $ddate4 = new datetime();
        $ddate4->settime(15,48,0);
        $tts4->setdeparture($ddate4);
        $tts4->setavailablefrom($afDate);
        $tts4->setavailableto($atDate);
        $tts4->settimetable($tt);

        $tts5 = new timetablestops();
        $tts5->setstop('Älvho');
        $ddate5 = new datetime();
        $ddate5->settime(16,1,0);
        $tts5->setdeparture($ddate5);
        $tts5->setavailablefrom($afDate);
        $tts5->setavailableto($atDate);
        $tts5->settimetable($tt);

        $tts6 = new timetablestops();
        $tts6->setstop('Tandsjöborg');
        $ddate6 = new datetime();
        $ddate6->settime(16,24,0);
        $tts6->setdeparture($ddate6);
        $tts6->setavailablefrom($afDate);
        $tts6->setavailableto($atDate);
        $tts6->settimetable($tt);
        
        $tts7 = new timetablestops();
        $tts7->setstop('Sveg');
        $ddate7 = new datetime();
        $ddate7->settime(17,23,0);
        $tts7->setdeparture($ddate7);
        $tts7->setavailablefrom($afDate);
        $tts7->setavailableto($atDate);
        $tts7->settimetable($tt);

        $manager->persist($tt);
        $manager->persist($tts);
        $manager->persist($tts2);
        $manager->persist($tts3);
        $manager->persist($tts4);
        $manager->persist($tts5);
        $manager->persist($tts6);
        $manager->persist($tts7);
        $manager->flush();
    }
}
