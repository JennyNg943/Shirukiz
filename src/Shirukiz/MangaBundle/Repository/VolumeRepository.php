<?php

namespace Shirukiz\MangaBundle\Repository;

/**
 * VolumeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VolumeRepository extends \Doctrine\ORM\EntityRepository
{
    function getVolumeA(){
        $qb = $this->createQueryBuilder('a');
        $qb->orderBy('a.dateAchat','DESC')
                ->setMaxResults(6)
                ->andWhere('a.possession = :id')
                ->setParameter('id', 1);
        
        return $qb->getQuery()->getResult();
    }
    
    function getVolumePo($id){
        $qb = $this->createQueryBuilder('a');
        $qb->select('count(a.id)')
           ->where('a.idLivre = :id')
           ->setParameter('id', $id)
           ->andWhere('a.possession = :id2')
           ->setParameter('id2', 1);
        
        return $qb->getQuery()->getSingleScalarResult();; 
    }
    
    public function getVolumeLivre($id){
        $qb=$this->createQueryBuilder('a');
        $qb->where('a.idLivre = :id')
                ->setParameter('id', $id)
                ->orderBy('a.Volume','ASC');

        return $qb->getQuery()->getResult();
    }
}
