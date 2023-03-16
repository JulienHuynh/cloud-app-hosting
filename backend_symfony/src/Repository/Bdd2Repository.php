<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

/**
 * @method Chat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chat[]    findAll()
 * @method Chat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Bdd2Repository extends ServiceEntityRepository 
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getBddSize(string $bddName)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "select SUM(data_length + index_length)/1024/1024 
        from information_schema.TABLES WHERE table_schema='user'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        return $stmt;
    }
}
