<?php

namespace App\Repository;

use App\Entity\HobbyFamily;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HobbyFamily>
 *
 * @method HobbyFamily|null find($id, $lockMode = null, $lockVersion = null)
 * @method HobbyFamily|null findOneBy(array $criteria, array $orderBy = null)
 * @method HobbyFamily[]    findAll()
 * @method HobbyFamily[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HobbyFamilyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HobbyFamily::class);
    }

    public function add(HobbyFamily $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HobbyFamily $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return HobbyFamily[] Returns an array of HobbyFamily objects
     */
    public function findByName($value): array
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

//    public function findOneBySomeField($value): ?HobbyFamily
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
