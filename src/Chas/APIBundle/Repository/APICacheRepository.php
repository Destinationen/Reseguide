<?php

namespace Chas\APIBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * APICacheRepository
 *
 */
class APICacheRepository extends EntityRepository
{
    public function findCached($hash)
    {
        $d = new \DateTime('now');

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT apic
                           FROM ChasAPIBundle:APICache apic
                           WHERE apic.request = :hash
                           AND apic.createddate = :experationdate
                           ')->setParameters( array('hash' => $hash, 'experationdate' => $d->format('Y-m-d')) );
        $r = $query->getSingleResult();

        return $r;
    }
}
