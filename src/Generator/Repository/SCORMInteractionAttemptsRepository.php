<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Repository;

use Brightspace\Bds\Schema\Generator\Entity\SCORMInteractionAttempts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SCORMInteractionAttempts>
 */
final class SCORMInteractionAttemptsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SCORMInteractionAttempts::class);
    }
}
