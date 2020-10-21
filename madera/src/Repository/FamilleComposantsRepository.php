<?php

namespace App\Repository;

use App\Entity\FamilleComposants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FamilleComposants|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilleComposants|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilleComposants[]    findAll()
 * @method FamilleComposants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleComposantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilleComposants::class);
    }

    // /**
    //  * @return FamilleComposants[] Returns an array of FamilleComposants objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamilleComposants
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
