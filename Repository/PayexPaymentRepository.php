<?php

namespace Bsadnu\PayexBundle\Repository;

use Bsadnu\PayexBundle\Entity\PayexPayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PayexPayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method PayexPayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method PayexPayment[]    findAll()
 * @method PayexPayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PayexPaymentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PayexPayment::class);
    }
}
