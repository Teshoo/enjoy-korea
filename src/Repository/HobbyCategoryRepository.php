<?php

namespace App\Repository;

use App\Entity\HobbyCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HobbyCategory>
 *
 * @method HobbyCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method HobbyCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method HobbyCategory[]    findAll()
 * @method HobbyCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HobbyCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HobbyCategory::class);
    }

    public function add(HobbyCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HobbyCategory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return HobbyCategory[] Returns an array of HobbyCategory objects
     */
    public function findByHobby($value): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.name = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?HobbyCategory
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
