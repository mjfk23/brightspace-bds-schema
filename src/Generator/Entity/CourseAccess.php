<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CourseAccessRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Access Brightspace Data Set returns information on each day each user has accessed each course offering
 * from the LMS (via a browser) across the organization. The data set does not include course access via any of our
 * Apps. The data set contains data from 1 January 2021 onwards and adheres to the default system limit of 150 million
 * rows of the most recent data. Note: If an administrator changes your time zone at the organization level, this can
 * affect the calculation of DayAccessed because this field is in local time.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#course-access
 */
#[ORM\Entity(repositoryClass: CourseAccessRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_ACCESS')]
#[UniqueConstraint(name: 'D2L_COURSE_ACCESS_PUK', columns: ['OrgUnitId', 'UserId', 'DayAccessed'])]
final class CourseAccess
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Indicates the most recent day in local time when a user accessed the course.
     */
    #[ORM\Column(name: 'DayAccessed', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $dayAccessed = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getDayAccessed(): ?\DateTimeImmutable
    {
        return $this->dayAccessed;
    }

    public function setDayAccessed(\DateTimeImmutable $dayAccessed): static
    {
        $this->dayAccessed = $dayAccessed;

        return $this;
    }
}
