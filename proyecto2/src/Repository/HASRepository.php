<?php

namespace App\Repository;

use App\Entity\HAS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HAS|null find($id, $lockMode = null, $lockVersion = null)
 * @method HAS|null findOneBy(array $criteria, array $orderBy = null)
 * @method HAS[]    findAll()
 * @method HAS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HASRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HAS::class);
    }

    // /**
    //  * @return HAS[] Returns an array of HAS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HAS
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
