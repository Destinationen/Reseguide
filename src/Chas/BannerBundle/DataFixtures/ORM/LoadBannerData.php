<?php

namespace Chas\BannerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\BannerBundle\Entity\Banner;
use DateTime;

class LoadBannerData implements FixtureInterface
{
    public function load($manager)
    {
       
        $pubDate = new DateTime();
        $pubDate->setDate(2012, 2, 10);
        
        $unPubDate = new DateTime();
        $unPubDate->setDate(2012, 3, 10);

        $b = new Banner();
        $b->setName('Hemma Hos Edith');
        $b->setUrl('http://hemmahosedith.se');
        $b->setPath('avatar.jpg');
        $b->setPubdate($pubDate);
        $b->setUnpubdate($unPubDate);
        $b->setClicks(0);

        $manager->persist($b);
        $manager->flush();
    }
}
