<?php

namespace App\Repository;

use App\Entity\Asiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Asiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asiento[]    findAll()
 * @method Asiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsientoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Asiento::class);
    }
    public function findByAsiento($bus_id)
    {
        return $this->createQueryBuilder('asiento')
            ->andWhere('asiento.bus = :bus')
            ->setParameter('bus', $bus_id)
            ->getQuery()
            ->getArrayResult()
            ;
    }
    // /**
    //  * @return Asiento[] Returns an array of Asiento objects
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
    public function findOneBySomeField($value): ?Asiento
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
