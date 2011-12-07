<?php

namespace Chas\BannerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\BannerBundle\Entity\Banner;
use DateTime;

class LoadBannerData implements FixtureInterface
{
    public function load($manager)
    {
       
        //$pubDate = new DateTime();
        //$pubDate->setDate(2012, 2, 10);

        $b = new Banner();
        $b->setName('Hemma Hos Edith');
        $b->setUrl('http://hemmahosedith.se');
        $b->setClicks(0);

        $manager->persist($b);
        $manager->flush();
    }
}
