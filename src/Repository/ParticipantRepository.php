<?php

namespace App\Repository;

use App\Entity\Participant;
use App\Entity\Platoon;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Participant>
 *
 * @method Participant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participant[]    findAll()
 * @method Participant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participant::class);
    }

    public function save(Participant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Participant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @var Participant
     * @return Participant Find the data of a participant according to the archer and the platoon
     */
    public function getParticipant(User $archer, Platoon $platoon): ?Participant
    {
        $result = $this->createQueryBuilder('p')
                    ->andWhere('p.archer = :archer')
                        ->setParameter('archer', $archer)
                    ->andWhere('p.platoon = :platoon')
                        ->setParameter('platoon', $platoon)
                    ->getQuery()
                    ->getOneOrNullResult()
                ;

        return $result;
    }

    /**
     * @var boolean
     * @return boolean Checks whether the participant is already registered in the platoon
     */
    public function isAlreadyRegistered(User $archer, Platoon $platoon): bool
    {
        $result = $this->createQueryBuilder('p')
                    ->andWhere('p.archer = :archer')
                        ->setParameter('archer', $archer)
                    ->andWhere('p.platoon = :platoon')
                        ->setParameter('platoon', $platoon)
                    ->getQuery()
                    ->getScalarResult()
                ;

        return count($result) > 0;
    }

    /**
     * @var Participant[]
     * @return Participant[] Returns an array of Participant objects
     */
    public function ranking($idTournament): array
    {
        // TODO : Vérifié ce qu'il se passe lorsque qu'on a plusieurs pelotons à des distances différentes
        return $this->createQueryBuilder('p')
                    ->leftJoin('p.platoon', 'pel')
                    ->andWhere('pel.tournament = :val')
                        ->setParameter('val', $idTournament)
                    ->OrderBy('p.category', 'ASC')
                        ->addOrderBy('p.points', 'DESC')
                        ->addOrderBy('p.numberOfX', 'DESC')
                        ->addOrderBy('p.numberOfTen', 'DESC')
                        ->addOrderBy('p.numberOfNine', 'DESC')
                    ->getQuery()
                    ->getResult()
                ;
    }



//    /**
//     * @return Participant[] Returns an array of Participant objects
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

//    public function findOneBySomeField($value): ?Participant
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
