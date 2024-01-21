<?php

namespace App\Repository;

use App\Entity\ProductComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductComment>
 *
 * @method ProductComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductComment[]    findAll()
 * @method ProductComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductComment::class);
    }

//    /**
//     * @return ProductComment[] Returns an array of ProductComment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProductComment
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
