<?php

namespace App\Repository;

use App\Entity\Admin;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
* @implements PasswordUpgraderInterface<User>
 *
 * @method Admin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admin[]    findAll()
 * @method Admin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(
        ManagerRegistry $registry,
        private PaginatorInterface $paginatorInterface
        ){
        parent::__construct($registry, Admin::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $admin, string $newHashedPassword): void
    {
        if (!$admin instanceof Admin) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $admin::class));
        }

        $admin->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($admin);
        $this->getEntityManager()->flush();
    }

    public function findBySearch(SearchData $searchData): PaginationInterface
    {
        $query = $this->createQueryBuilder('c');
            
        if (!empty($searchData->getSort()) and !empty($searchData->getDirection())) {
            $query->addOrderBy("c.{$searchData->getSort()}", $searchData->getDirection() ? $searchData->getDirection() : 'DESC');
        } else {
            $query->addOrderBy("c.createdAt", 'DESC');
        }

        if (!empty($searchData->getQ())) {
            $query = $query
                ->andWhere('c.username LIKE :string OR c.fullname LIKE :string')
                ->setParameter('string', "%{$searchData->getQ()}%");
        }

        $query = $query
            ->getQuery()
            ->getResult();

        $posts = $this->paginatorInterface->paginate($query, $searchData->getPage(), 9);

        return $posts;
    }

}