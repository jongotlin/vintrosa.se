<?php

namespace AppBundle\Repository;

class PostRepository extends \Doctrine\ORM\EntityRepository
{
    public function findForFirstPage()
    {
        $from = new \DateTime();
        $from->setTime(0, 0, 0);

        return $this->createQueryBuilder('p')
            ->select('p, c')
            ->innerJoin('p.categories', 'c')
            ->where('p.date >= :from')
            ->andWhere('p.publishedAt IS NOT NULL')
            ->setParameter('from', $from)
            ->orderBy('p.date')
            ->getQuery()
            ->execute()
            ;
    }
}
