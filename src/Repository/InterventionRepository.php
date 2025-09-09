<?php

namespace App\Repository;

use App\Entity\Intervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class InterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intervention::class);
    }

    // Exemple de méthode personnalisée
    public function findByTechnicienOrEtat(?string $technicien, ?string $etat)
    {
        $qb = $this->createQueryBuilder('i');

        if ($technicien) {
            $qb->andWhere('i.technicien = :technicien')
               ->setParameter('technicien', $technicien);
        }

        if ($etat) {
            $qb->andWhere('i.etat = :etat')
               ->setParameter('etat', $etat);
        }

        return $qb->getQuery()->getResult();
    }
}
