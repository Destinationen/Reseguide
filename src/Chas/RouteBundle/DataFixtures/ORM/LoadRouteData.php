<?php

namespace Chas\RouteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\RouteBundle\Entity\Route;
use Chas\RouteBundle\Entity\RouteLocation;
//use DateTime;

class LoadRouteData implements FixtureInterface
{
    public function load($manager)
    {
        $r = new Route();
        $r->setName('Funäsdalen busstation');
        $r->setDescription('');
        $r->setIsStop(true);
        
        $rl = new RouteLocation();
        $rl->setRoute($r);
        $rl->setLat('12.544772');
        $rl->setLon('62.545376');
        
        $manager->persist($r);
        $manager->persist($rl);
        $manager->flush();
        
    }
}
