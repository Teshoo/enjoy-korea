<?php

namespace App\Repository;

use App\Entity\HobbyAdditionalInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HobbyAdditionalInfo>
 *
 * @method HobbyAdditionalInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method HobbyAdditionalInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method HobbyAdditionalInfo[]    findAll()
 * @method HobbyAdditionalInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HobbyAdditionalInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HobbyAdditionalInfo::class);
    }

    public function add(HobbyAdditionalInfo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HobbyAdditionalInfo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return HobbyAdditionalInfo[] Returns an array of HobbyAdditionalInfo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HobbyAdditionalInfo
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
