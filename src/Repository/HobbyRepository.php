<?php

namespace App\Repository;

use App\Entity\Hobby;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hobby>
 *
 * @method Hobby|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hobby|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hobby[]    findAll()
 * @method Hobby[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HobbyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hobby::class);
    }

    public function add(Hobby $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Hobby $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Hobby[] Returns an array of Hobby objects
     */
    public function findByHobbyCategory($value): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.name = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Hobby[] Returns an array of Hobby objects
     */
    public function findByUser($value): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.id = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

//    public function findOneBySomeField($value): ?Hobby
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
