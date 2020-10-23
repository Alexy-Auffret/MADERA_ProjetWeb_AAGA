<?php

namespace App\Repository;

use App\Entity\Montants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Montants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Montants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Montants[]    findAll()
 * @method Montants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MontantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Montants::class);
    }

     /**
      * @return Montants[] Retourne une collection de Montants filtrés sur les familles de composants
      */

    public function findByMontantsByComposantFamily($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.composants.famille_id = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Montants
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
