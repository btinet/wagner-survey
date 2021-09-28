<?php

namespace App\Repository;

use App\Entity\SurveyResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SurveyResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method SurveyResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method SurveyResult[]    findAll()
 * @method SurveyResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurveyResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SurveyResult::class);
    }

    // /**
    //  * @return SurveyResult[] Returns an array of SurveyResult objects
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
    public function findOneBySomeField($value): ?SurveyResult
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
