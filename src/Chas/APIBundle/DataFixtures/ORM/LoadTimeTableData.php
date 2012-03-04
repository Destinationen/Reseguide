<?php

namespace Chas\APIBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Chas\APIBundle\Entity\TimeTable;

class LoadTimeTableData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        // Define The TimeTable
        $tt = new TimeTable();
        $tt->setName('Skidbussen');
        $tt->setType('bus');

        /**
         * Persisting
         */
        $manager->persist($tt);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
