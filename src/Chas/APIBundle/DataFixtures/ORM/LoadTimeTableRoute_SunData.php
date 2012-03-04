<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Chas\APIBundle\Entity\TimeTableTrips;
use Chas\APIBundle\Entity\TimeTableRoute;
use Chas\APIBundle\Entity\TimeTableStops;

use DateTime;

class LoadTimeTableRoute_SunData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Load dependencies
         */
        $ttt = $manager->getRepository('ChasAPIBundle:TimeTableTrips')
            ->findTripsOrderedById();

        $stops = $manager->getRepository('ChasAPIBundle:TimeTableStops')
            ->findStopsOrderedById();

        /**
         * Define the Route
         */

        // Monday to Saturday
        
        // GREEN

        // Funäsdalens Bussplan
        $route_1 = new TimeTableRoute();
        $route_1->setRouteorder(1);
        $route_1->setTitle('Funäsdalslinjen');
        $ttr_1_departure = new datetime();
        $ttr_1_departure->settime(15,40,0);
        $route_1->setDeparture($ttr_1_departure);
        $route_1->addStops($stops[0]);
        $route_1->addTrips($ttt[2]);

        // Funäsdalsberget
        $route_2 = new TimeTableRoute();
        $route_2->setRouteorder(2);
        $route_2->setTitle('Funäsdalslinjen');
        $ttr_2_departure = new datetime();
        $ttr_2_departure->settime(15,43,0);
        $route_2->setDeparture($ttr_2_departure);
        $route_2->addStops($stops[17]);
        $route_2->addTrips($ttt[2]);

        // Funäsdalens Fjällkamping
        $route_3 = new TimeTableRoute();
        $route_3->setRouteorder(3);
        $route_3->setTitle('Funäsdalslinjen');
        $ttr_3_departure = new datetime();
        $ttr_3_departure->settime(15,45,0);
        $route_3->setDeparture($ttr_3_departure);
        $route_3->addStops($stops[18]);
        $route_3->addTrips($ttt[2]);

        // Flon
        $route_4 = new TimeTableRoute();
        $route_4->setRouteorder(4);
        $route_4->setTitle('Funäsdalslinjen');
        $ttr_4_departure = new datetime();
        $ttr_4_departure->settime(15,51,0);
        $route_4->setDeparture($ttr_4_departure);
        $route_4->addStops($stops[19]);
        $route_4->addTrips($ttt[2]);

        // Gruvgubben
        $route_5 = new TimeTableRoute();
        $route_5->setRouteorder(5);
        $route_5->setTitle('Funäsdalslinjen');
        $ttr_5_departure = new datetime();
        $ttr_5_departure->settime(15,53,0);
        $route_5->setDeparture($ttr_5_departure);
        $route_5->addStops($stops[20]);
        $route_5->addTrips($ttt[2]);

        // Macken
        $route_6 = new TimeTableRoute();
        $route_6->setRouteorder(6);
        $route_6->setTitle('Funäsdalslinjen');
        $ttr_6_departure = new datetime();
        $ttr_6_departure->settime(15,54,0);
        $route_6->setDeparture($ttr_6_departure);
        $route_6->addStops($stops[21]);
        $route_6->addTrips($ttt[2]);

        // Bjorkliden
        $route_7 = new TimeTableRoute();
        $route_7->setRouteorder(7);
        $route_7->setTitle('Funäsdalslinjen');
        $ttr_7_departure = new datetime();
        $ttr_7_departure->settime(15,54,0);
        $route_7->setDeparture($ttr_7_departure);
        $route_7->addStops($stops[22]);
        $route_7->addTrips($ttt[2]);

        // Bruksvallarna, ICA Stigmyhrs
        $route_8 = new TimeTableRoute();
        $route_8->setRouteorder(8);
        $route_8->setTitle('Funäsdalslinjen');
        $ttr_8_departure = new datetime();
        $ttr_8_departure->settime(16,00,0);
        $route_8->setDeparture($ttr_8_departure);
        $route_8->addStops($stops[23]);
        $route_8->addTrips($ttt[2]);

        // Ramundberget
        $route_9 = new TimeTableRoute();
        $route_9->setRouteorder(9);
        $route_9->setTitle('Funäsdalslinjen');
        $ttr_9_departure = new datetime();
        $ttr_9_departure->settime(16,25,0);
        $route_9->setDeparture($ttr_9_departure);
        $route_9->addStops($stops[24]);
        $route_9->addTrips($ttt[2]);

        // Bruksvallarna, ICA Stigmyhrs
        $route_10 = new TimeTableRoute();
        $route_10->setRouteorder(10);
        $route_10->setTitle('Funäsdalslinjen');
        $ttr_10_departure = new datetime();
        $ttr_10_departure->settime(16,35,0);
        $route_10->setDeparture($ttr_10_departure);
        $route_10->addStops($stops[23]);
        $route_10->addTrips($ttt[2]);

        // Bjorkliden
        $route_11 = new TimeTableRoute();
        $route_11->setRouteorder(11);
        $route_11->setTitle('Funäsdalslinjen');
        $ttr_11_departure = new datetime();
        $ttr_11_departure->settime(16,36,0);
        $route_11->setDeparture($ttr_11_departure);
        $route_11->addStops($stops[22]);
        $route_11->addTrips($ttt[2]);

        // Macken
        $route_12 = new TimeTableRoute();
        $route_12->setRouteorder(12);
        $route_12->setTitle('Funäsdalslinjen');
        $ttr_12_departure = new datetime();
        $ttr_12_departure->settime(16,36,0);
        $route_12->setDeparture($ttr_12_departure);
        $route_12->addStops($stops[21]);
        $route_12->addTrips($ttt[2]);

        // Gruvgubben
        $route_13 = new TimeTableRoute();
        $route_13->setRouteorder(13);
        $route_13->setTitle('Funäsdalslinjen');
        $ttr_13_departure = new datetime();
        $ttr_13_departure->settime(16,42,0);
        $route_13->setDeparture($ttr_13_departure);
        $route_13->addStops($stops[20]);
        $route_13->addTrips($ttt[2]);

        // Flon
        $route_14 = new TimeTableRoute();
        $route_14->setRouteorder(14);
        $route_14->setTitle('Funäsdalslinjen');
        $ttr_14_departure = new datetime();
        $ttr_14_departure->settime(16,44,0);
        $route_14->setDeparture($ttr_14_departure);
        $route_14->addStops($stops[19]);
        $route_14->addTrips($ttt[2]);

        // Funäsdalens Fjällkamping
        $route_15 = new TimeTableRoute();
        $route_15->setRouteorder(15);
        $route_15->setTitle('Funäsdalslinjen');
        $ttr_15_departure = new datetime();
        $ttr_15_departure->settime(16,47,0);
        $route_15->setDeparture($ttr_15_departure);
        $route_15->addStops($stops[18]);
        $route_15->addTrips($ttt[2]);

        // Funäsdalsberget
        $route_16 = new TimeTableRoute();
        $route_16->setRouteorder(16);
        $route_16->setTitle('Funäsdalslinjen');
        $ttr_16_departure = new datetime();
        $ttr_16_departure->settime(16,50,0);
        $route_16->setDeparture($ttr_7_departure);
        $route_16->addStops($stops[17]);
        $route_16->addTrips($ttt[2]);

        // REDLINE

        // Funäsdalens Bussplan
        $route_17 = new TimeTableRoute();
        $route_17->setRouteorder(17);
        $route_17->setTitle('Tänndalslinjen');
        $ttr_17_departure = new datetime();
        $ttr_17_departure->settime(14,15,0);
        $route_17->setDeparture($ttr_17_departure);
        $route_17->addStops($stops[0]);
        $route_17->addTrips($ttt[2]);
        
        // Shell
        $route_18 = new TimeTableRoute();
        $route_18->setRouteorder(18);
        $route_18->setTitle('Tänndalslinjen');
        $ttr_18_departure = new datetime();
        $ttr_18_departure->settime(14,16,0);
        $route_18->setDeparture($ttr_18_departure);
        $route_18->addStops($stops[1]);
        $route_18->addTrips($ttt[2]);
        
        // OK
        $route_19 = new TimeTableRoute();
        $route_19->setRouteorder(19);
        $route_19->setTitle('Tänndalslinjen');
        $ttr_19_departure = new datetime();
        $ttr_19_departure->settime(14,17,0);
        $route_19->setDeparture($ttr_19_departure);
        $route_19->addStops($stops[2]);
        $route_19->addTrips($ttt[2]);
        
        // Grönländaren
        $route_20 = new TimeTableRoute();
        $route_20->setRouteorder(20);
        $route_20->setTitle('Tänndalslinjen');
        $ttr_20_departure = new datetime();
        $ttr_20_departure->settime(14,19,0);
        $route_20->setDeparture($ttr_20_departure);
        $route_20->addStops($stops[3]);
        $route_20->addTrips($ttt[2]);

        // Fjällkällan
        $route_21 = new TimeTableRoute();
        $route_21->setRouteorder(21);
        $route_21->setTitle('Tänndalslinjen');
        $ttr_21_departure = new datetime();
        $ttr_21_departure->settime(14,20,0);
        $route_21->setDeparture($ttr_21_departure);
        $route_21->addStops($stops[4]);
        $route_21->addTrips($ttt[2]);

        // Högstahållan
        $route_22 = new TimeTableRoute();
        $route_22->setRouteorder(22);
        $route_22->setTitle('Tänndalslinjen');
        $ttr_22_departure = new datetime();
        $ttr_22_departure->settime(14,22,0);
        $route_22->setDeparture($ttr_22_departure);
        $route_22->addStops($stops[5]);
        $route_22->addTrips($ttt[2]);

        // Skarvruet
        $route_23 = new TimeTableRoute();
        $route_23->setRouteorder(23);
        $route_23->setTitle('Tänndalslinjen');
        $ttr_23_departure = new datetime();
        $ttr_23_departure->settime(14,22,0);
        $route_23->setDeparture($ttr_23_departure);
        $route_23->addStops($stops[6]);
        $route_23->addTrips($ttt[2]);

        // Skarvrusätern
        $route_24 = new TimeTableRoute();
        $route_24->setRouteorder(24);
        $route_24->setTitle('Tänndalslinjen');
        $ttr_24_departure = new datetime();
        $ttr_24_departure->settime(14,22,0);
        $route_24->setDeparture($ttr_24_departure);
        $route_24->addStops($stops[7]);
        $route_24->addTrips($ttt[2]);

        // Kjåsken
        $route_25 = new TimeTableRoute();
        $route_25->setRouteorder(25);
        $route_25->setTitle('Tänndalslinjen');
        $ttr_25_departure = new datetime();
        $ttr_25_departure->settime(14,24,0);
        $route_25->setDeparture($ttr_25_departure);
        $route_25->addStops($stops[8]);
        $route_25->addTrips($ttt[2]);

        // Hotell Tänndalen
        $route_26 = new TimeTableRoute();
        $route_26->setRouteorder(26);
        $route_26->setTitle('Tänndalslinjen');
        $ttr_26_departure = new datetime();
        $ttr_26_departure->settime(14,25,0);
        $route_26->setDeparture($ttr_26_departure);
        $route_26->addStops($stops[9]);
        $route_26->addTrips($ttt[2]);

        // Skidstadion
        $route_27 = new TimeTableRoute();
        $route_27->setRouteorder(27);
        $route_27->setTitle('Tänndalslinjen');
        $ttr_27_departure = new datetime();
        $ttr_27_departure->settime(14,26,0);
        $route_27->setDeparture($ttr_27_departure);
        $route_27->addStops($stops[10]);
        $route_27->addTrips($ttt[2]);

        // Tänndalens Skiduthyrning
        $route_28 = new TimeTableRoute();
        $route_28->setRouteorder(28);
        $route_28->setTitle('Tänndalslinjen');
        $ttr_28_departure = new datetime();
        $ttr_28_departure->settime(14,27,0);
        $route_28->setDeparture($ttr_28_departure);
        $route_28->addStops($stops[11]);
        $route_28->addTrips($ttt[2]);

        // Svansjöliften
        $route_29 = new TimeTableRoute();
        $route_29->setRouteorder(29);
        $route_29->setTitle('Tänndalslinjen');
        $ttr_29_departure = new datetime();
        $ttr_29_departure->settime(14,30,0);
        $route_29->setDeparture($ttr_29_departure);
        $route_29->addStops($stops[12]);
        $route_29->addTrips($ttt[2]);

        // Buskvallen
        $route_30 = new TimeTableRoute();
        $route_30->setRouteorder(30);
        $route_30->setTitle('Tänndalslinjen');
        $ttr_30_departure = new datetime();
        $ttr_30_departure->settime(14,35,0);
        $route_30->setDeparture($ttr_30_departure);
        $route_30->addStops($stops[13]);
        $route_30->addTrips($ttt[2]);

        // Hamrafjället
        $route_31 = new TimeTableRoute();
        $route_31->setRouteorder(31);
        $route_31->setTitle('Tänndalslinjen');
        $ttr_31_departure = new datetime();
        $ttr_31_departure->settime(14,41,0);
        $route_31->setDeparture($ttr_31_departure);
        $route_31->addStops($stops[14]);
        $route_31->addTrips($ttt[2]);

        // Göransgården
        $route_32 = new TimeTableRoute();
        $route_32->setRouteorder(32);
        $route_32->setTitle('Tänndalslinjen');
        $ttr_32_departure = new datetime();
        $ttr_32_departure->settime(14,44,0);
        $route_32->setDeparture($ttr_32_departure);
        $route_32->addStops($stops[15]);
        $route_32->addTrips($ttt[2]);

        // Fjällnäs
        $route_33 = new TimeTableRoute();
        $route_33->setRouteorder(33);
        $route_33->setTitle('Tänndalslinjen');
        $ttr_33_departure = new datetime();
        $ttr_33_departure->settime(14,45,0);
        $route_33->setDeparture($ttr_33_departure);
        $route_33->addStops($stops[16]);
        $route_33->addTrips($ttt[2]);

        // Göransgården <-
        $route_34 = new TimeTableRoute();
        $route_34->setRouteorder(34);
        $route_34->setTitle('Tänndalslinjen');
        $ttr_34_departure = new datetime();
        $ttr_34_departure->settime(14,46,0);
        $route_34->setDeparture($ttr_34_departure);
        $route_34->addStops($stops[15]);
        $route_34->addTrips($ttt[2]);

        // Hamrafjället
        $route_35 = new TimeTableRoute();
        $route_35->setRouteorder(35);
        $route_35->setTitle('Tänndalslinjen');
        $ttr_35_departure = new datetime();
        $ttr_35_departure->settime(14,49,0);
        $route_35->setDeparture($ttr_35_departure);
        $route_35->addStops($stops[14]);
        $route_35->addTrips($ttt[2]);

        // Buskvallen
        $route_36 = new TimeTableRoute();
        $route_36->setRouteorder(36);
        $route_36->setTitle('Tänndalslinjen');
        $ttr_36_departure = new datetime();
        $ttr_36_departure->settime(14,50,0);
        $route_36->setDeparture($ttr_33_departure);
        $route_36->addStops($stops[13]);
        $route_36->addTrips($ttt[2]);

        // Svansjöliften
        $route_37 = new TimeTableRoute();
        $route_37->setRouteorder(37);
        $route_37->setTitle('Tänndalslinjen');
        $ttr_37_departure = new datetime();
        $ttr_37_departure->settime(14,51,0);
        $route_37->setDeparture($ttr_37_departure);
        $route_37->addStops($stops[12]);
        $route_37->addTrips($ttt[2]);

        // Tänndalens Skiduthyrning
        $route_38 = new TimeTableRoute();
        $route_38->setRouteorder(38);
        $route_38->setTitle('Tänndalslinjen');
        $ttr_38_departure = new datetime();
        $ttr_38_departure->settime(14,52,0);
        $route_38->setDeparture($ttr_38_departure);
        $route_38->addStops($stops[11]);
        $route_38->addTrips($ttt[2]);

        // Skidstadion
        $route_39 = new TimeTableRoute();
        $route_39->setRouteorder(39);
        $route_39->setTitle('Tänndalslinjen');
        $ttr_39_departure = new datetime();
        $ttr_39_departure->settime(14,53,0);
        $route_39->setDeparture($ttr_39_departure);
        $route_39->addStops($stops[10]);
        $route_39->addTrips($ttt[2]);

        // Hotell Tänndalen
        $route_40 = new TimeTableRoute();
        $route_40->setRouteorder(40);
        $route_40->setTitle('Tänndalslinjen');
        $ttr_40_departure = new datetime();
        $ttr_40_departure->settime(14,55,0);
        $route_40->setDeparture($ttr_40_departure);
        $route_40->addStops($stops[9]);
        $route_40->addTrips($ttt[2]);

        // Kjåsken
        $route_41 = new TimeTableRoute();
        $route_41->setRouteorder(41);
        $route_41->setTitle('Tänndalslinjen');
        $ttr_41_departure = new datetime();
        $ttr_41_departure->settime(14,56,0);
        $route_41->setDeparture($ttr_41_departure);
        $route_41->addStops($stops[8]);
        $route_41->addTrips($ttt[2]);

        // Skarvrusätern
        $route_42 = new TimeTableRoute();
        $route_42->setRouteorder(42);
        $route_42->setTitle('Tänndalslinjen');
        $ttr_42_departure = new datetime();
        $ttr_42_departure->settime(14,58,0);
        $route_42->setDeparture($ttr_42_departure);
        $route_42->addStops($stops[7]);
        $route_42->addTrips($ttt[2]);

        // Skarvruet
        $route_43 = new TimeTableRoute();
        $route_43->setRouteorder(43);
        $route_43->setTitle('Tänndalslinjen');
        $ttr_43_departure = new datetime();
        $ttr_43_departure->settime(14,58,0);
        $route_43->setDeparture($ttr_43_departure);
        $route_43->addStops($stops[6]);
        $route_43->addTrips($ttt[2]);

        // Högstahållan
        $route_44 = new TimeTableRoute();
        $route_44->setRouteorder(44);
        $route_44->setTitle('Tänndalslinjen');
        $ttr_44_departure = new datetime();
        $ttr_44_departure->settime(14,58,0);
        $route_44->setDeparture($ttr_44_departure);
        $route_44->addStops($stops[5]);
        $route_44->addTrips($ttt[2]);
 
        // Fjällkällan
        $route_45 = new TimeTableRoute();
        $route_45->setRouteorder(45);
        $route_45->setTitle('Tänndalslinjen');
        $ttr_45_departure = new datetime();
        $ttr_45_departure->settime(15,00,0);
        $route_45->setDeparture($ttr_45_departure);
        $route_45->addStops($stops[4]);
        $route_45->addTrips($ttt[2]);

        // Görnländaren
        $route_46 = new TimeTableRoute();
        $route_46->setRouteorder(46);
        $route_46->setTitle('Tänndalslinjen');
        $ttr_46_departure = new datetime();
        $ttr_46_departure->settime(15,01,0);
        $route_46->setDeparture($ttr_46_departure);
        $route_46->addStops($stops[3]);
        $route_46->addTrips($ttt[2]);

        // OK
        $route_47 = new TimeTableRoute();
        $route_47->setRouteorder(47);
        $route_47->setTitle('Tänndalslinjen');
        $ttr_47_departure = new datetime();
        $ttr_47_departure->settime(15,03,0);
        $route_47->setDeparture($ttr_47_departure);
        $route_47->addStops($stops[2]);
        $route_47->addTrips($ttt[2]);

        // Shell
        $route_48 = new TimeTableRoute();
        $route_48->setRouteorder(48);
        $route_48->setTitle('Tänndalslinjen');
        $ttr_48_departure = new datetime();
        $ttr_48_departure->settime(15,04,0);
        $route_48->setDeparture($ttr_48_departure);
        $route_48->addStops($stops[1]);
        $route_48->addTrips($ttt[2]);

        // Funäsdalens Bussplan
        $route_49 = new TimeTableRoute();
        $route_49->setRouteorder(49);
        $route_49->setTitle('Tänndalslinjen');
        $ttr_49_departure = new datetime();
        $ttr_49_departure->settime(15,15,0);
        $route_49->setDeparture($ttr_49_departure);
        $route_49->addStops($stops[0]);
        $route_49->addTrips($ttt[2]);
        $route_49->setEndstation(true);


        /**
         * Persisting
         */

        // Persist the Routes
        $manager->persist($route_1);
        $manager->persist($route_2);
        $manager->persist($route_3);
        $manager->persist($route_4);
        $manager->persist($route_5);
        $manager->persist($route_6);
        $manager->persist($route_7);
        $manager->persist($route_8);
        $manager->persist($route_9);
        $manager->persist($route_10);

        $manager->persist($route_11);
        $manager->persist($route_12);
        $manager->persist($route_13);
        $manager->persist($route_14);
        $manager->persist($route_15);
        $manager->persist($route_16);
        $manager->persist($route_17);
        $manager->persist($route_18);
        $manager->persist($route_19);

        $manager->persist($route_20);
        $manager->persist($route_21);
        $manager->persist($route_22);
        $manager->persist($route_23);
        $manager->persist($route_24);
        $manager->persist($route_25);
        $manager->persist($route_26);
        $manager->persist($route_27);
        $manager->persist($route_28);

        $manager->persist($route_29);
        $manager->persist($route_30);
        $manager->persist($route_31);
        $manager->persist($route_32);
        $manager->persist($route_33);
        $manager->persist($route_34);
        $manager->persist($route_35);
        $manager->persist($route_36);
        $manager->persist($route_37);

        $manager->persist($route_38);
        $manager->persist($route_39);
        $manager->persist($route_40);
        $manager->persist($route_41);
        $manager->persist($route_42);
        $manager->persist($route_43);
        $manager->persist($route_44);
        $manager->persist($route_45);
        $manager->persist($route_46);

        $manager->persist($route_47);
        $manager->persist($route_48);
        $manager->persist($route_49);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}
