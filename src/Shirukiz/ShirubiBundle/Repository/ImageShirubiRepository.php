<?php

namespace Shirukiz\ShirubiBundle\Repository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageShirubiRepository extends \Doctrine\ORM\EntityRepository
{
    function getLastImage(){
        $qb=$this->createQueryBuilder('a');
        
        $qb
            ->where('a.type > :id')
            ->setParameter('id', 2)
            ->orderBy('a.date','ASC');
        

        return $qb->getQuery()->getResult();
    }
    
   
}
