<?php

namespace Chas\APIBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * APICacheRepository
 *
 */
class APICacheRepository extends EntityRepository
{
    public function findCached($hash, \DateTime $d)
    {
        //$d = new \DateTime('now');

        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT apic
                           FROM ChasAPIBundle:APICache apic
                           WHERE apic.request = :hash
                           AND apic.createddate = :experationdate
                           ')->setParameters( array('hash' => $hash, 'experationdate' => $d->format('Y-m-d')) );
        
        try {
            $r = $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            $r = null;
        }

        return $r;
    }
}
