<?php

namespace App\Repository;

use App\Entity\AffCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AffCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method AffCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method AffCompany[]    findAll()
 * @method AffCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AffCompany::class);
    }

    // /**
    //  * @return AffCompany[] Returns an array of AffCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AffCompany
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
