<?php

namespace Chas\BannerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Chas\APIBundle\Entity\Page;
use DateTime;

class LoadPageData implements FixtureInterface
{
    public function load($manager)
    {
        //$pubDate = new DateTime();
        //$pubDate->setDate(2012, 2, 10);

        $p = new Page();
        $p->setPage('taxi');
        $p->setPhonenumber('0684-123 45');
        $p->setEmail('hello@taxifunas.nu');
        $p->setAddress('Rörosvägen 123, Funäsdalen');

        $manager->persist($p);
        $manager->flush();
    }
}
