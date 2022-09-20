<?php

namespace App\Repository;

use App\Entity\HddTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HddTypes>
 *
 * @method HddTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method HddTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method HddTypes[]    findAll()
 * @method HddTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HddTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HddTypes::class);
    }

    public function add(HddTypes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HddTypes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getAllAsArray()
    {
        $hddTypes = $this->findAll();
        $arrayHddTypes = array();
        foreach($hddTypes as $type){
            $arrayHddTypes[$type->getTypeName()] = $type->getTypeName();
        }
        return $arrayHddTypes;
    }

//    /**
//     * @return HddTypes[] Returns an array of HddTypes objects
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

//    public function findOneBySomeField($value): ?HddTypes
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
