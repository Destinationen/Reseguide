<?php

namespace Chas\BannerBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BannerRepository
 *
 */
class BannerRepository extends EntityRepository
{

    public function findPublished()
    {
        $d = new \DateTime('now');

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT b
                           FROM ChasBannerBundle:Banner b
                           WHERE b.pubdate <= :now
                           AND b.unpubdate > :now
                           ')->setParameters( array('now' => $d->format('Y-m-d')) );
        
        try {
            $r = $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            $r = null;
        }

        return $r;
    }


}
