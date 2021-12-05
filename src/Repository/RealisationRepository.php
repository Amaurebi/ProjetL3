<?php

namespace App\Repository;

use App\Entity\Realisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Realisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realisation[]    findAll()
 * @method Realisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realisation::class);
    }

    public function last3()
    {
        return $this->createQueryBuilder('r')
            ->where('r.afficher = :t')
            ->setParameter('t', 1)
            ->orderBy('r.dateFin', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    public function last3ByCategory($v)
    {
        return $this->createQueryBuilder('r')
            ->join('r.categorie', 'c')
            ->addSelect('c')
            ->where('r.afficher = :t')
            ->setParameter('t', 1)
            ->andWhere('c.id = :val')
            ->setParameter('val', $v)
            ->orderBy('r.dateFin', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllByDate()
    {
        return $this->createQueryBuilder('r')
            ->where('r.afficher = :t')
            ->setParameter('t', 1)
            ->orderBy('r.dateFin', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Realisation[] Returns an array of Realisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Realisation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
