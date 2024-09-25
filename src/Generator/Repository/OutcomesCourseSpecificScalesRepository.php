<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Repository;

use Brightspace\Bds\Schema\Generator\Entity\OutcomesCourseSpecificScales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OutcomesCourseSpecificScales>
 */
final class OutcomesCourseSpecificScalesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OutcomesCourseSpecificScales::class);
    }
}
