<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Chas\APIBundle\Entity\TimeTableTrips;
use Chas\APIBundle\Entity\TimeTableRoute;
use Chas\APIBundle\Entity\TimeTableStops;

use DateTime;

class LoadTimeTableRoute_Mon2SatData extends AbstractFixture implements OrderedFixtureInterface
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

        // Funäsdalens Bussplan
        $route_1 = new TimeTableRoute();
        $route_1->setRouteorder(1);
        $route_1->setTitle('Linje 4');
        $ttr_1_departure = new datetime();
        $ttr_1_departure->settime(14,15,0);
        $route_1->setDeparture($ttr_1_departure);
        $route_1->addStops($stops[0]);
        $route_1->addTrips($ttt[1]);

        // Funäsdalsberget
        $route_2 = new TimeTableRoute();
        $route_2->setRouteorder(2);
        $route_2->setTitle('Linje 4');
        $ttr_2_departure = new datetime();
        $ttr_2_departure->settime(14,18,0);
        $route_2->setDeparture($ttr_2_departure);
        $route_2->addStops($stops[17]);
        $route_2->addTrips($ttt[1]);

        // Funäsdalens Fjällkamping
        $route_3 = new TimeTableRoute();
        $route_3->setRouteorder(3);
        $route_3->setTitle('Linje 4');
        $ttr_3_departure = new datetime();
        $ttr_3_departure->settime(14,20,0);
        $route_3->setDeparture($ttr_3_departure);
        $route_3->addStops($stops[18]);
        $route_3->addTrips($ttt[1]);

        // Flon
        $route_4 = new TimeTableRoute();
        $route_4->setRouteorder(4);
        $route_4->setTitle('Linje 4');
        $ttr_4_departure = new datetime();
        $ttr_4_departure->settime(14,26,0);
        $route_4->setDeparture($ttr_4_departure);
        $route_4->addStops($stops[19]);
        $route_4->addTrips($ttt[1]);

        // Gruvgubben
        $route_5 = new TimeTableRoute();
        $route_5->setRouteorder(5);
        $route_5->setTitle('Linje 4');
        $ttr_5_departure = new datetime();
        $ttr_5_departure->settime(14,28,0);
        $route_5->setDeparture($ttr_5_departure);
        $route_5->addStops($stops[20]);
        $route_5->addTrips($ttt[1]);

        // Macken
        $route_6 = new TimeTableRoute();
        $route_6->setRouteorder(6);
        $route_6->setTitle('Linje 4');
        $ttr_6_departure = new datetime();
        $ttr_6_departure->settime(14,29,0);
        $route_6->setDeparture($ttr_6_departure);
        $route_6->addStops($stops[21]);
        $route_6->addTrips($ttt[1]);

        // Bjorkliden
        $route_7 = new TimeTableRoute();
        $route_7->setRouteorder(7);
        $route_7->setTitle('Linje 4');
        $ttr_7_departure = new datetime();
        $ttr_7_departure->settime(14,29,0);
        $route_7->setDeparture($ttr_7_departure);
        $route_7->addStops($stops[22]);
        $route_7->addTrips($ttt[1]);

        // Bruksvallarna, ICA Stigmyhrs
        $route_8 = new TimeTableRoute();
        $route_8->setRouteorder(8);
        $route_8->setTitle('Linje 4');
        $ttr_8_departure = new datetime();
        $ttr_8_departure->settime(14,35,0);
        $route_8->setDeparture($ttr_8_departure);
        $route_8->addStops($stops[23]);
        $route_8->addTrips($ttt[1]);

        // Ramundberget
        $route_9 = new TimeTableRoute();
        $route_9->setRouteorder(9);
        $route_9->setTitle('Linje 4');
        $ttr_9_departure = new datetime();
        $ttr_9_departure->settime(14,55,0);
        $route_9->setDeparture($ttr_9_departure);
        $route_9->addStops($stops[24]);
        $route_9->addTrips($ttt[1]);




        // Ramundberget
        $route_9a = new TimeTableRoute();
        $route_9a->setRouteorder(1);
        $route_9a->setTitle('Linje 5');
        $ttr_9a_departure = new datetime();
        $ttr_9a_departure->settime(14,55,0);
        $route_9a->setDeparture($ttr_9_departure);
        $route_9a->addStops($stops[24]);
        $route_9a->addTrips($ttt[1]);

        // Bruksvallarna, ICA Stigmyhrs
        $route_10 = new TimeTableRoute();
        $route_10->setRouteorder(2);
        $route_10->setTitle('Linje 5');
        $ttr_10_departure = new datetime();
        $ttr_10_departure->settime(15,10,0);
        $route_10->setDeparture($ttr_10_departure);
        $route_10->addStops($stops[23]);
        $route_10->addTrips($ttt[1]);

        // Bjorkliden
        $route_11 = new TimeTableRoute();
        $route_11->setRouteorder(3);
        $route_11->setTitle('Linje 5');
        $ttr_11_departure = new datetime();
        $ttr_11_departure->settime(15,11,0);
        $route_11->setDeparture($ttr_11_departure);
        $route_11->addStops($stops[22]);
        $route_11->addTrips($ttt[1]);

        // Macken
        $route_12 = new TimeTableRoute();
        $route_12->setRouteorder(4);
        $route_12->setTitle('Linje 5');
        $ttr_12_departure = new datetime();
        $ttr_12_departure->settime(15,11,0);
        $route_12->setDeparture($ttr_12_departure);
        $route_12->addStops($stops[21]);
        $route_12->addTrips($ttt[1]);

        // Gruvgubben
        $route_13 = new TimeTableRoute();
        $route_13->setRouteorder(5);
        $route_13->setTitle('Linje 5');
        $ttr_13_departure = new datetime();
        $ttr_13_departure->settime(15,17,0);
        $route_13->setDeparture($ttr_13_departure);
        $route_13->addStops($stops[20]);
        $route_13->addTrips($ttt[1]);

        // Flon
        $route_14 = new TimeTableRoute();
        $route_14->setRouteorder(6);
        $route_14->setTitle('Linje 5');
        $ttr_14_departure = new datetime();
        $ttr_14_departure->settime(15,19,0);
        $route_14->setDeparture($ttr_14_departure);
        $route_14->addStops($stops[19]);
        $route_14->addTrips($ttt[1]);

        // Funäsdalens Fjällkamping
        $route_15 = new TimeTableRoute();
        $route_15->setRouteorder(7);
        $route_15->setTitle('Linje 5');
        $ttr_15_departure = new datetime();
        $ttr_15_departure->settime(15,22,0);
        $route_15->setDeparture($ttr_15_departure);
        $route_15->addStops($stops[18]);
        $route_15->addTrips($ttt[1]);

        // Funäsdalsberget
        $route_16 = new TimeTableRoute();
        $route_16->setRouteorder(8);
        $route_16->setTitle('Linje 5');
        $ttr_16_departure = new datetime();
        $ttr_16_departure->settime(15,25,0);
        $route_16->setDeparture($ttr_7_departure);
        $route_16->addStops($stops[17]);
        $route_16->addTrips($ttt[1]);

        // Funäsdalens Bussplan
        $route_17 = new TimeTableRoute();
        $route_17->setRouteorder(9);
        $route_17->setTitle('Linje 5');
        $ttr_17_departure = new datetime();
        $ttr_17_departure->settime(15,40,0);
        $route_17->setDeparture($ttr_17_departure);
        $route_17->addStops($stops[0]);
        $route_17->addTrips($ttt[1]);

        // Shell
        $route_18 = new TimeTableRoute();
        $route_18->setRouteorder(10);
        $route_18->setTitle('Linje 5');
        $ttr_18_departure = new datetime();
        $ttr_18_departure->settime(15,41,0);
        $route_18->setDeparture($ttr_18_departure);
        $route_18->addStops($stops[1]);
        $route_18->addTrips($ttt[1]);
        
        // OK
        $route_19 = new TimeTableRoute();
        $route_19->setRouteorder(11);
        $route_19->setTitle('Linje 5');
        $ttr_19_departure = new datetime();
        $ttr_19_departure->settime(15,42,0);
        $route_19->setDeparture($ttr_19_departure);
        $route_19->addStops($stops[2]);
        $route_19->addTrips($ttt[1]);
        
        // Grönländaren
        $route_20 = new TimeTableRoute();
        $route_20->setRouteorder(12);
        $route_20->setTitle('Linje 5');
        $ttr_20_departure = new datetime();
        $ttr_20_departure->settime(15,44,0);
        $route_20->setDeparture($ttr_20_departure);
        $route_20->addStops($stops[3]);
        $route_20->addTrips($ttt[1]);

        // Fjällkällan
        $route_21 = new TimeTableRoute();
        $route_21->setRouteorder(13);
        $route_21->setTitle('Linje 5');
        $ttr_21_departure = new datetime();
        $ttr_21_departure->settime(15,45,0);
        $route_21->setDeparture($ttr_21_departure);
        $route_21->addStops($stops[4]);
        $route_21->addTrips($ttt[1]);

        // Högstahållan
        $route_22 = new TimeTableRoute();
        $route_22->setRouteorder(14);
        $route_22->setTitle('Linje 5');
        $ttr_22_departure = new datetime();
        $ttr_22_departure->settime(15,47,0);
        $route_22->setDeparture($ttr_22_departure);
        $route_22->addStops($stops[5]);
        $route_22->addTrips($ttt[1]);

        // Skarvruet
        $route_23 = new TimeTableRoute();
        $route_23->setRouteorder(15);
        $route_23->setTitle('Linje 5');
        $ttr_23_departure = new datetime();
        $ttr_23_departure->settime(15,47,0);
        $route_23->setDeparture($ttr_23_departure);
        $route_23->addStops($stops[6]);
        $route_23->addTrips($ttt[1]);

        // Skarvruet
        $route_24 = new TimeTableRoute();
        $route_24->setRouteorder(16);
        $route_24->setTitle('Linje 5');
        $ttr_24_departure = new datetime();
        $ttr_24_departure->settime(15,47,0);
        $route_24->setDeparture($ttr_24_departure);
        $route_24->addStops($stops[7]);
        $route_24->addTrips($ttt[1]);

        // Kjåsken
        $route_25 = new TimeTableRoute();
        $route_25->setRouteorder(17);
        $route_25->setTitle('Linje 5');
        $ttr_25_departure = new datetime();
        $ttr_25_departure->settime(15,49,0);
        $route_25->setDeparture($ttr_25_departure);
        $route_25->addStops($stops[8]);
        $route_25->addTrips($ttt[1]);

        // Hotell Tänndalen
        $route_26 = new TimeTableRoute();
        $route_26->setRouteorder(18);
        $route_26->setTitle('Linje 5');
        $ttr_26_departure = new datetime();
        $ttr_26_departure->settime(15,50,0);
        $route_26->setDeparture($ttr_26_departure);
        $route_26->addStops($stops[9]);
        $route_26->addTrips($ttt[1]);

        // Skidstadion
        $route_27 = new TimeTableRoute();
        $route_27->setRouteorder(19);
        $route_27->setTitle('Linje 5');
        $ttr_27_departure = new datetime();
        $ttr_27_departure->settime(15,51,0);
        $route_27->setDeparture($ttr_27_departure);
        $route_27->addStops($stops[10]);
        $route_27->addTrips($ttt[1]);

        // Tänndalens Skiduthyrning
        $route_28 = new TimeTableRoute();
        $route_28->setRouteorder(20);
        $route_28->setTitle('Linje 5');
        $ttr_28_departure = new datetime();
        $ttr_28_departure->settime(15,52,0);
        $route_28->setDeparture($ttr_28_departure);
        $route_28->addStops($stops[11]);
        $route_28->addTrips($ttt[1]);

        // Svansjöliften
        $route_29 = new TimeTableRoute();
        $route_29->setRouteorder(21);
        $route_29->setTitle('Linje 5');
        $ttr_29_departure = new datetime();
        $ttr_29_departure->settime(15,55,0);
        $route_29->setDeparture($ttr_29_departure);
        $route_29->addStops($stops[12]);
        $route_29->addTrips($ttt[1]);

        // Buskvallen
        $route_30 = new TimeTableRoute();
        $route_30->setRouteorder(22);
        $route_30->setTitle('Linje 5');
        $ttr_30_departure = new datetime();
        $ttr_30_departure->settime(16,0,0);
        $route_30->setDeparture($ttr_30_departure);
        $route_30->addStops($stops[13]);
        $route_30->addTrips($ttt[1]);

        // Hamrafjället
        $route_31 = new TimeTableRoute();
        $route_31->setRouteorder(23);
        $route_31->setTitle('Linje 5');
        $ttr_31_departure = new datetime();
        $ttr_31_departure->settime(16,6,0);
        $route_31->setDeparture($ttr_31_departure);
        $route_31->addStops($stops[14]);
        $route_31->addTrips($ttt[1]);

        // Göransgården
        $route_32 = new TimeTableRoute();
        $route_32->setRouteorder(24);
        $route_32->setTitle('Linje 5');
        $ttr_32_departure = new datetime();
        $ttr_32_departure->settime(16,9,0);
        $route_32->setDeparture($ttr_32_departure);
        $route_32->addStops($stops[15]);
        $route_32->addTrips($ttt[1]);

        // Fjällnäs
        $route_33 = new TimeTableRoute();
        $route_33->setRouteorder(25);
        $route_33->setTitle('Linje 5');
        $ttr_33_departure = new datetime();
        $ttr_33_departure->settime(16,15,0);
        $route_33->setDeparture($ttr_33_departure);
        $route_33->addStops($stops[16]);
        $route_33->addTrips($ttt[1]);



        // Fjällnäs
        $route_33a = new TimeTableRoute();
        $route_33a->setRouteorder(1);
        $route_33a->setTitle('Linje 6');
        $ttr_33a_departure = new datetime();
        $ttr_33a_departure->settime(16,15,0);
        $route_33a->setDeparture($ttr_33a_departure);
        $route_33a->addStops($stops[16]);
        $route_33a->addTrips($ttt[1]);

        // Göransgården
        $route_34 = new TimeTableRoute();
        $route_34->setRouteorder(2);
        $route_34->setTitle('Linje 6');
        $ttr_34_departure = new datetime();
        $ttr_34_departure->settime(16,16,0);
        $route_34->setDeparture($ttr_34_departure);
        $route_34->addStops($stops[15]);
        $route_34->addTrips($ttt[1]);

        // Hamrafjället
        $route_35 = new TimeTableRoute();
        $route_35->setRouteorder(3);
        $route_35->setTitle('Linje 6');
        $ttr_35_departure = new datetime();
        $ttr_35_departure->settime(16,17,0);
        $route_35->setDeparture($ttr_35_departure);
        $route_35->addStops($stops[14]);
        $route_35->addTrips($ttt[1]);

        // Buskvallen
        $route_36 = new TimeTableRoute();
        $route_36->setRouteorder(4);
        $route_36->setTitle('Linje 6');
        $ttr_36_departure = new datetime();
        $ttr_36_departure->settime(16,18,0);
        $route_36->setDeparture($ttr_33_departure);
        $route_36->addStops($stops[13]);
        $route_36->addTrips($ttt[1]);

        // Svansjöliften
        $route_37 = new TimeTableRoute();
        $route_37->setRouteorder(5);
        $route_37->setTitle('Linje 6');
        $ttr_37_departure = new datetime();
        $ttr_37_departure->settime(16,19,0);
        $route_37->setDeparture($ttr_37_departure);
        $route_37->addStops($stops[12]);
        $route_37->addTrips($ttt[1]);

        // Tänndalens Skiduthyrning
        $route_38 = new TimeTableRoute();
        $route_38->setRouteorder(6);
        $route_38->setTitle('Linje 6');
        $ttr_38_departure = new datetime();
        $ttr_38_departure->settime(16,20,0);
        $route_38->setDeparture($ttr_38_departure);
        $route_38->addStops($stops[11]);
        $route_38->addTrips($ttt[1]);

        // Skidstadion
        $route_39 = new TimeTableRoute();
        $route_39->setRouteorder(7);
        $route_39->setTitle('Linje 6');
        $ttr_39_departure = new datetime();
        $ttr_39_departure->settime(16,21,0);
        $route_39->setDeparture($ttr_39_departure);
        $route_39->addStops($stops[10]);
        $route_39->addTrips($ttt[1]);

        // Hotell Tänndalen
        $route_40 = new TimeTableRoute();
        $route_40->setRouteorder(8);
        $route_40->setTitle('Linje 6');
        $ttr_40_departure = new datetime();
        $ttr_40_departure->settime(16,25,0);
        $route_40->setDeparture($ttr_40_departure);
        $route_40->addStops($stops[9]);
        $route_40->addTrips($ttt[1]);

        // Kjåsken
        $route_41 = new TimeTableRoute();
        $route_41->setRouteorder(9);
        $route_41->setTitle('Linje 6');
        $ttr_41_departure = new datetime();
        $ttr_41_departure->settime(16,26,0);
        $route_41->setDeparture($ttr_41_departure);
        $route_41->addStops($stops[8]);
        $route_41->addTrips($ttt[1]);

        // Skarvrusätern
        $route_42 = new TimeTableRoute();
        $route_42->setRouteorder(10);
        $route_42->setTitle('Linje 6');
        $ttr_42_departure = new datetime();
        $ttr_42_departure->settime(16,28,0);
        $route_42->setDeparture($ttr_42_departure);
        $route_42->addStops($stops[7]);
        $route_42->addTrips($ttt[1]);

        // Skarvruet
        $route_43 = new TimeTableRoute();
        $route_43->setRouteorder(11);
        $route_43->setTitle('Linje 6');
        $ttr_43_departure = new datetime();
        $ttr_43_departure->settime(16,28,0);
        $route_43->setDeparture($ttr_43_departure);
        $route_43->addStops($stops[6]);
        $route_43->addTrips($ttt[1]);

        // Högstahållan
        $route_44 = new TimeTableRoute();
        $route_44->setRouteorder(12);
        $route_44->setTitle('Linje 6');
        $ttr_44_departure = new datetime();
        $ttr_44_departure->settime(16,28,0);
        $route_44->setDeparture($ttr_44_departure);
        $route_44->addStops($stops[5]);
        $route_44->addTrips($ttt[1]);
 
        // Fjällkällan
        $route_45 = new TimeTableRoute();
        $route_45->setRouteorder(13);
        $route_45->setTitle('Linje 6');
        $ttr_45_departure = new datetime();
        $ttr_45_departure->settime(16,30,0);
        $route_45->setDeparture($ttr_45_departure);
        $route_45->addStops($stops[4]);
        $route_45->addTrips($ttt[1]);

        // Görnländaren
        $route_46 = new TimeTableRoute();
        $route_46->setRouteorder(14);
        $route_46->setTitle('Linje 6');
        $ttr_46_departure = new datetime();
        $ttr_46_departure->settime(16,31,0);
        $route_46->setDeparture($ttr_46_departure);
        $route_46->addStops($stops[3]);
        $route_46->addTrips($ttt[1]);

        // OK
        $route_47 = new TimeTableRoute();
        $route_47->setRouteorder(15);
        $route_47->setTitle('Linje 6');
        $ttr_47_departure = new datetime();
        $ttr_47_departure->settime(16,33,0);
        $route_47->setDeparture($ttr_47_departure);
        $route_47->addStops($stops[2]);
        $route_47->addTrips($ttt[1]);

        // Shell
        $route_48 = new TimeTableRoute();
        $route_48->setRouteorder(16);
        $route_48->setTitle('Linje 6');
        $ttr_48_departure = new datetime();
        $ttr_48_departure->settime(16,34,0);
        $route_48->setDeparture($ttr_48_departure);
        $route_48->addStops($stops[1]);
        $route_48->addTrips($ttt[1]);

        // Funäsdalens Bussplan
        $route_49 = new TimeTableRoute();
        $route_49->setRouteorder(17);
        $route_49->setTitle('Linje 6');
        $ttr_49_departure = new datetime();
        $ttr_49_departure->settime(16,50,0);
        $route_49->setDeparture($ttr_49_departure);
        $route_49->addStops($stops[0]);
        $route_49->addTrips($ttt[1]);
        $route_49->setEndstation(true);


        /**
         * Persisting
         */

        // Persist the Routes
        $manager->persist($route_1); // Funäs
        $manager->persist($route_2);
        $manager->persist($route_3);
        $manager->persist($route_4);
        $manager->persist($route_5);
        $manager->persist($route_6);
        $manager->persist($route_7);
        $manager->persist($route_8);
        $manager->persist($route_9); // Ramis

        $manager->persist($route_9a); // Ramis
        $manager->persist($route_10);
        $manager->persist($route_11);
        $manager->persist($route_12);
        $manager->persist($route_13);
        $manager->persist($route_14);
        $manager->persist($route_15);
        $manager->persist($route_16);
        $manager->persist($route_17); // Fuäns
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
        $manager->persist($route_33); // Fjällnäs

        $manager->persist($route_33a); // Fjällnäs
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
        $manager->persist($route_49); // Funäs

        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}
