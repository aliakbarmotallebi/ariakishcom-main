<?php

namespace App\Repository;

use App\Entity\ProductCatalogure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductCatalogure>
 *
 * @method ProductCatalogure|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCatalogure|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCatalogure[]    findAll()
 * @method ProductCatalogure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCatalogureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCatalogure::class);
    }

//    /**
//     * @return ProductCatalogure[] Returns an array of ProductCatalogure objects
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

//    public function findOneBySomeField($value): ?ProductCatalogure
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
