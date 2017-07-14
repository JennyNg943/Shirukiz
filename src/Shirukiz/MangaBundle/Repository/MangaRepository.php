<?php

namespace Shirukiz\MangaBundle\Repository;

/**
 * MangaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MangaRepository extends \Doctrine\ORM\EntityRepository
{
    public function getManga(){
        $qb=$this->createQueryBuilder('a');
        $qb->orderBy('a.nom','ASC');

        return $qb->getQuery()->getResult();
    }
    
    function getRecherche($r){
        $r = "%".$r."%";
        $qb = $this->createQueryBuilder('a');
        $qb
            ->where('a.nom LIKE :r ')
            ->setParameter('r', $r);
        return $qb->getQuery()->getResult();        
    }
    
    
}
