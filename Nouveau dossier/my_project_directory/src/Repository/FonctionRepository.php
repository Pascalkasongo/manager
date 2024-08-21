<?php

namespace App\Repository;

use App\Entity\Fonction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fonction>
 *
 * @method Fonction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fonction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fonction[]    findAll()
 * @method Fonction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fonction::class);
    }

//    /**
//     * @return Fonction[] Returns an array of Fonction objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fonction
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
