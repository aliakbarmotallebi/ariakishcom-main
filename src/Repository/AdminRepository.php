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
        $data = $this->createQueryBuilder('p');
            
        if (!empty($searchData->sort) and !empty($searchData->direction)) {
            $data = $data
                ->addOrderBy('p.:col', ':sort')
                ->setParameters([
                    'col' => $searchData->direction,
                    'sort' => $searchData->sort
                ]);
        }

        if (!empty($searchData->q)) {
            $data = $data
                ->orWhere('p.username LIKE :q')
                ->orWhere('p.fullname LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }

        $data = $data
            ->getQuery()
            ->getResult();

        $posts = $this->paginatorInterface->paginate($data, $searchData->page, 9);

        return $posts;
    }

}