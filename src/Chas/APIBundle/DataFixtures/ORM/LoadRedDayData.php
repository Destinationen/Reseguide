<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\APIBundle\Entity\RedDay;
use DateTime;

class LoadRedDayData implements FixtureInterface
{
    public function load($manager)
    {
        
        // 2012

        $rdDay = new DateTime();
        $rdDay->setDate(2012,1,1);

        $rd = new RedDay();
        $rd->setName('Nyårsdagen');
        $rd->setDay($rdDay);

    
        $rdDay1 = new DateTime();
        $rdDay1->setDate(2012,1,6);

        $rd1 = new RedDay();
        $rd1->setName('Trettondag jul');
        $rd1->setDay($rdDay1);


        $rdDay2 = new DateTime();
        $rdDay2->setDate(2012,4,6);

        $rd2 = new RedDay();
        $rd2->setName('Långfredag');
        $rd2->setDay($rdDay2);


        $rdDay3 = new DateTime();
        $rdDay3->setDate(2012,4,7);

        $rd3 = new RedDay();
        $rd3->setName('Påskafton');
        $rd3->setDay($rdDay3);


        $rdDay4 = new DateTime();
        $rdDay4->setDate(2012,4,8);

        $rd4 = new RedDay();
        $rd4->setName('Påskdagen');
        $rd4->setDay($rdDay4);


        $rdDay5 = new DateTime();
        $rdDay5->setDate(2012,4,9);

        $rd5 = new RedDay();
        $rd5->setName('Annandag påsk');
        $rd5->setDay($rdDay5);


        $rdDay6 = new DateTime();
        $rdDay6->setDate(2012,5,1);

        $rd6 = new RedDay();
        $rd6->setName('Första maj');
        $rd6->setDay($rdDay6);

        
        $rdDay7 = new DateTime();
        $rdDay7->setDate(2012,5,17);

        $rd7 = new RedDay();
        $rd7->setName('Kristi Himmelsfärdsdag');
        $rd7->setDay($rdDay7);


        $rdDay8 = new DateTime();
        $rdDay8->setDate(2012,5,27);

        $rd8 = new RedDay();
        $rd8->setName('Pingstdagen');
        $rd8->setDay($rdDay8);


        $rdDay9 = new DateTime();
        $rdDay9->setDate(2012,6,6);

        $rd9 = new RedDay();
        $rd9->setName('Nationaldag');
        $rd9->setDay($rdDay9);


        $rdDay10 = new DateTime();
        $rdDay10->setDate(2012,6,23);

        $rd10 = new RedDay();
        $rd10->setName('Midsommardagen');
        $rd10->setDay($rdDay10);

 
        $rdDay11 = new DateTime();
        $rdDay11->setDate(2012,11,3);

        $rd11 = new RedDay();
        $rd11->setName('Allhelgonadagen');
        $rd11->setDay($rdDay11);

 
        $rdDay12 = new DateTime();
        $rdDay12->setDate(2012,12,24);

        $rd12 = new RedDay();
        $rd12->setName('Julafton');
        $rd12->setDay($rdDay12);


        $rdDay13 = new DateTime();
        $rdDay13->setDate(2012,12,25);

        $rd13 = new RedDay();
        $rd13->setName('Juldagen');
        $rd13->setDay($rdDay13);


        $rdDay14 = new DateTime();
        $rdDay14->setDate(2012,12,26);

        $rd14 = new RedDay();
        $rd14->setName('Annandag jul');
        $rd14->setDay($rdDay14);


        $rdDay15 = new DateTime();
        $rdDay15->setDate(2012,12,31);

        $rd15 = new RedDay();
        $rd15->setName('Nyårsafton');
        $rd15->setDay($rdDay15);



        // 2013  

        $rdDay16 = new DateTime();
        $rdDay16->setDate(2013,1,1);

        $rd16 = new RedDay();
        $rd16->setName('Nyårsdagen');
        $rd16->setDay($rdDay16);

    
        $rdDay17 = new DateTime();
        $rdDay17->setDate(2013,1,6);

        $rd17 = new RedDay();
        $rd17->setName('Trettondag jul');
        $rd17->setDay($rdDay17);


        $rdDay18 = new DateTime();
        $rdDay18->setDate(2013,3,28);

        $rd18 = new RedDay();
        $rd18->setName('Skärtorsdag');
        $rd18->setDay($rdDay18);


        $rdDay19 = new DateTime();
        $rdDay19->setDate(2013,3,29);

        $rd19 = new RedDay();
        $rd19->setName('Långfredag');
        $rd19->setDay($rdDay19);


        $rdDay20 = new DateTime();
        $rdDay20->setDate(2013,3,30);

        $rd20 = new RedDay();
        $rd20->setName('Påskafton');
        $rd20->setDay($rdDay20);


        $rdDay21 = new DateTime();
        $rdDay21->setDate(2013,3,31);

        $rd21 = new RedDay();
        $rd21->setName('Påskdagen');
        $rd21->setDay($rdDay21);


        $rdDay22 = new DateTime();
        $rdDay22->setDate(2013,4,1);

        $rd22 = new RedDay();
        $rd22->setName('Annandag påsk');
        $rd22->setDay($rdDay22);


        $rdDay23 = new DateTime();
        $rdDay23->setDate(2013,5,1);

        $rd23 = new RedDay();
        $rd23->setName('Första maj');
        $rd23->setDay($rdDay23);

        
        $rdDay24 = new DateTime();
        $rdDay24->setDate(2013,5,8);

        $rd24 = new RedDay();
        $rd24->setName('Kristi Himmelsfärd');
        $rd24->setDay($rdDay24);


        $rdDay25 = new DateTime();
        $rdDay25->setDate(2013,5,9);

        $rd25 = new RedDay();
        $rd25->setName('Kristi Himmelsfärdsdag');
        $rd25->setDay($rdDay25);


        $rdDay26 = new DateTime();
        $rdDay26->setDate(2013,5,19);

        $rd26 = new RedDay();
        $rd26->setName('Pingstdagen');
        $rd26->setDay($rdDay26);


        $rdDay26 = new DateTime();
        $rdDay26->setDate(2013,6,6);

        $rd26 = new RedDay();
        $rd26->setName('Nationaldag');
        $rd26->setDay($rdDay26);


        $rdDay27 = new DateTime();
        $rdDay27->setDate(2013,6,21);

        $rd27 = new RedDay();
        $rd27->setName('Midsommarafton');
        $rd27->setDay($rdDay27);


        $rdDay28 = new DateTime();
        $rdDay28->setDate(2013,6,22);

        $rd28 = new RedDay();
        $rd28->setName('Midsommardagen');
        $rd28->setDay($rdDay28);

  
        $rdDay29 = new DateTime();
        $rdDay29->setDate(2013,11,1);

        $rd29 = new RedDay();
        $rd29->setName('Allhelgonaafton');
        $rd29->setDay($rdDay29);


        $rdDay30 = new DateTime();
        $rdDay30->setDate(2013,11,2);

        $rd30 = new RedDay();
        $rd30->setName('Allhelgonadagen');
        $rd30->setDay($rdDay30);

 
        $rdDay31 = new DateTime();
        $rdDay31->setDate(2012,12,24);

        $rd31 = new RedDay();
        $rd31->setName('Julafton');
        $rd31->setDay($rdDay31);


        $rdDay32 = new DateTime();
        $rdDay32->setDate(2012,12,25);

        $rd32 = new RedDay();
        $rd32->setName('Juldagen');
        $rd32->setDay($rdDay32);


        $rdDay33 = new DateTime();
        $rdDay33->setDate(2012,12,26);

        $rd33 = new RedDay();
        $rd33->setName('Annandag jul');
        $rd33->setDay($rdDay33);


        $rdDay34 = new DateTime();
        $rdDay34->setDate(2012,12,31);

        $rd34 = new RedDay();
        $rd34->setName('Nyårsafton');
        $rd34->setDay($rdDay34);




        $manager->persist($rd);
        $manager->persist($rd1);
        $manager->persist($rd2);
        $manager->persist($rd3);
        $manager->persist($rd4);
        $manager->persist($rd5);
        $manager->persist($rd6);
        $manager->persist($rd7);
        $manager->persist($rd8);
        $manager->persist($rd9);
        $manager->persist($rd10);
        $manager->persist($rd11);
        $manager->persist($rd12);
        $manager->persist($rd13);
        $manager->persist($rd14);
        $manager->persist($rd15);
        $manager->persist($rd16);
        $manager->persist($rd17);
        $manager->persist($rd18);
        $manager->persist($rd19);
        $manager->persist($rd20);
        $manager->persist($rd21);
        $manager->persist($rd22);
        $manager->persist($rd23);
        $manager->persist($rd24);
        $manager->persist($rd25);
        $manager->persist($rd26);
        $manager->persist($rd27);
        $manager->persist($rd28);
        $manager->persist($rd29);
        $manager->persist($rd30);
        $manager->persist($rd31);
        $manager->persist($rd32);
        $manager->persist($rd33);
        $manager->persist($rd34);
        
        $manager->flush();



    }
}
