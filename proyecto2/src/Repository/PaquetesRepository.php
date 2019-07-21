<?php

namespace App\Repository;

use App\Entity\Paquetes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Paquetes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paquetes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paquetes[]    findAll()
 * @method Paquetes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaquetesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Paquetes::class);
    }

    // /**
    //  * @return Paquetes[] Returns an array of Paquetes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paquetes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
