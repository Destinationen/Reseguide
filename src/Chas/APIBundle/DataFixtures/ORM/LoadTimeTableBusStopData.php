<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Chas\APIBundle\Entity\TimeTable;
use Chas\APIBundle\Entity\TimeTableTrips;
use Chas\APIBundle\Entity\TimeTableRoute;
use Chas\APIBundle\Entity\TimeTableStops;

use DateTime;

class LoadTimeTableBusStopData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // Define all the stops
        $tts_1 = new TimeTableStops();
        $tts_1->setTitle('Funäsdalens Bussplan');
        $tts_1->setLatitude('12.544772');
        $tts_1->setLongitude('62.545376');

        // Red-line
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

        $tts_6 = new TimeTableStops();
        $tts_6->setTitle('Högstahållan');
        $tts_6->setLatitude('12.471419');
        $tts_6->setLongitude('62.537392');

        $tts_7 = new TimeTableStops();
        $tts_7->setTitle('Skarvruet');
        $tts_7->setLatitude('12.413767');
        $tts_7->setLongitude('62.537395');

        $tts_8 = new TimeTableStops();
        $tts_8->setTitle('Skarvrusätern');
        $tts_8->setLatitude('12.396583');
        $tts_8->setLongitude('62.538914');

        $tts_9 = new TimeTableStops();
        $tts_9->setTitle('Kjåsken');
        $tts_9->setLatitude('12.346913');
        $tts_9->setLongitude('62.538914');

        $tts_10 = new TimeTableStops();
        $tts_10->setTitle('Hotell Tänndalen');
        $tts_10->setLatitude('12.332528');
        $tts_10->setLongitude('62.543640');
        
        $tts_11 = new TimeTableStops();
        $tts_11->setTitle('Skidstadion');
        $tts_11->setLatitude('12.323556');
        $tts_11->setLongitude('62.546970');

        $tts_12 = new TimeTableStops();
        $tts_12->setTitle('Tänndalens Skiduthyrning');
        $tts_12->setLatitude('12.309639');
        $tts_12->setLongitude('62.546970');

        $tts_13 = new TimeTableStops();
        $tts_13->setTitle('Svansjöliften');
        $tts_13->setLatitude('12.254889');
        $tts_13->setLongitude('62.563168');

        $tts_14 = new TimeTableStops();
        $tts_14->setTitle('Buskvallen');
        $tts_14->setLatitude('12.242956');
        $tts_14->setLongitude('62.569267');

        $tts_15 = new TimeTableStops();
        $tts_15->setTitle('Hamrafjället');
        $tts_15->setLatitude('12.227333');
        $tts_15->setLongitude('62.574360');

        $tts_16 = new TimeTableStops();
        $tts_16->setTitle('Göransgården');
        $tts_16->setLatitude('12.187694');
        $tts_16->setLongitude('62.569267');

        $tts_17 = new TimeTableStops();
        $tts_17->setTitle('Fjällnäs');
        $tts_17->setLatitude('12.179028');
        $tts_17->setLongitude('62.598778');

        // Green-line
        $tts_18 = new TimeTableStops();
        $tts_18->setTitle('Funäsdalsberget');
        $tts_18->setLatitude('12.554417');
        $tts_18->setLongitude('62.546083');

        $tts_19 = new TimeTableStops();
        $tts_19->setTitle('Funäsdalens Fjällkamping');
        $tts_19->setLatitude('12.563778');
        $tts_19->setLongitude('62.568253');

        $tts_20 = new TimeTableStops();
        $tts_20->setTitle('Flon');
        $tts_20->setLatitude('12.471419');
        $tts_20->setLongitude('62.621094');

        $tts_21 = new TimeTableStops();
        $tts_21->setTitle('Gruvgubben');
        $tts_21->setLatitude('12.444441');
        $tts_21->setLongitude('62.637070');

        $tts_22 = new TimeTableStops();
        $tts_22->setTitle('Macken');
        $tts_22->setLatitude('12.439629');
        $tts_22->setLongitude('62.639900');

        $tts_23 = new TimeTableStops();
        $tts_23->setTitle('Björkliden');
        $tts_23->setLatitude('12.433594');
        $tts_23->setLongitude('62.641491');

        $tts_24 = new TimeTableStops();
        $tts_24->setTitle('Bruksvallarna, ICA Stigmyhrs');
        $tts_24->setLatitude('12.417480');
        $tts_24->setLongitude('62.641354');

        $tts_25 = new TimeTableStops();
        $tts_25->setTitle('Ramundberget');
        $tts_25->setLatitude('12.388630');
        $tts_25->setLongitude('62.700886');


        /**
         * Persisting
         */

        // Persist the stops

        $manager->persist($tts_1);
        $manager->persist($tts_2);
        $manager->persist($tts_3);
        $manager->persist($tts_4);
        $manager->persist($tts_5);
        $manager->persist($tts_6);
        $manager->persist($tts_7);
        $manager->persist($tts_8);
        $manager->persist($tts_9);
        $manager->persist($tts_10);
        $manager->persist($tts_11);
        $manager->persist($tts_12);
        $manager->persist($tts_13);
        $manager->persist($tts_14);
        $manager->persist($tts_15);
        $manager->persist($tts_16);
        $manager->persist($tts_17);
        $manager->persist($tts_18);
        $manager->persist($tts_19);
        $manager->persist($tts_20);
        $manager->persist($tts_21);
        $manager->persist($tts_22);
        $manager->persist($tts_23);
        $manager->persist($tts_24);
        $manager->persist($tts_25);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}
