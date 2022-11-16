<?php

namespace App\Repository;

use App\Entity\IdTypeCour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdTypeCour>
 *
 * @method IdTypeCour|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdTypeCour|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdTypeCour[]    findAll()
 * @method IdTypeCour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdTypeCourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdTypeCour::class);
    }

    public function save(IdTypeCour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IdTypeCour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IdTypeCour[] Returns an array of IdTypeCour objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IdTypeCour
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
