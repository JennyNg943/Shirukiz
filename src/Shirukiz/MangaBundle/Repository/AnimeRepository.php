<?php

namespace Shirukiz\MangaBundle\Repository;

/**
 * AnimeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnimeRepository extends \Doctrine\ORM\EntityRepository
{
    function getAnime(){
        $qb=$this->createQueryBuilder('a');
        $qb->orderBy('a.nom','ASC');

        return $qb->getQuery()->getResult();
    }
}
