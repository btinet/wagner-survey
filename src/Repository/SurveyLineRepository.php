<?php

namespace App\Repository;

use App\Entity\SurveyLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SurveyLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method SurveyLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method SurveyLine[]    findAll()
 * @method SurveyLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurveyLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SurveyLine::class);
    }

    // /**
    //  * @return SurveyLine[] Returns an array of SurveyLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SurveyLine
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
