<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Repository;

use Brightspace\Bds\Schema\Generator\Entity\SISCourseMergeLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SISCourseMergeLog>
 */
final class SISCourseMergeLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SISCourseMergeLog::class);
    }
}
