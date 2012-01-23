<?php

namespace Chas\APIBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TimeTableRepository
 */
class TimeTableRepository extends EntityRepository
{
    public function findTrip($id, $from, $to, $when)
    {
        $redday = $this->getEntityManager()
            ->getRepository('ChasAPIBundle:RedDay')
            ->findByDay($when);
        $rd = 0;
        if ($redday){
            $rd = 1;
        }

        $r = $this->getEntityManager()
            ->createQuery('SELECT tts FROM ChasAPIBundle:TimeTableStops tts
            WHERE :redday = tts.redday
            AND :now >= tts.availablefrom
            AND :now <= tts.availableto')
            ->setParameter('now', $when)
            ->setParameter('redday', $rd );

        try {
            return $r->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }

    }
}
