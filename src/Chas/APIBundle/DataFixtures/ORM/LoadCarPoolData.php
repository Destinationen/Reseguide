<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\APIBundle\Entity\CarPool;
use Chas\APIBundle\Entity\Destination;
use DateTime;

class LoadCarPoolData implements FixtureInterface
{
    public function load($manager)
    {
        $d1 = new Destination();
        $d1->setName('Funäsdalen');
        
        $cp1 = new CarPool();
        $cp1->setDeparture('Stockholm');
        $cp1->setDestination($d1);
        
        $cpDate1 = new DateTime();
        $cpDate1->setDate(2012, 1, 15);

        $cp1->setDateFrom($cpDate1);
        $cp1->setSeats(3);
        $cp1->setName('Uno Larsson');
        $cp1->setEmail('uno@webbninja.nu');
        $cp1->setPhonenumber('076-7757571');
       
        $d2 = new Destination();
        $d2->setName('Ramundberget');
        
        $cp2 = new CarPool();
        $cp2->setDeparture('Örebro');
        $cp2->setDestination($d2);
        
        $cpDate2 = new DateTime();
        $cpDate2->setDate(2012, 2, 10);

        $cp2->setDateFrom($cpDate2);
        $cp2->setSeats(2);
        $cp2->setName('Anette Persson');
        $cp2->setEmail('ap@hotmail.com');
        $cp2->setPhonenumber('070-1231212');
        

        $manager->persist($d1);
        $manager->persist($cp1);
        $manager->persist($d2);
        $manager->persist($cp2);
        $manager->flush();
    }
}
