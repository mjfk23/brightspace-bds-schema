<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CourseAccessLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Access Log Brightspace Data Set returns information on users accessing their course offerings using the
 * Pulse app. The data set creates a row with a timestamp when a user initially accesses a course, then creates
 * additional rows for every 30 minutes that the user spends in the course.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#course-access-log
 */
#[ORM\Entity(repositoryClass: CourseAccessLogRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_ACCESS_LOG')]
#[UniqueConstraint(name: 'D2L_COURSE_ACCESS_LOG_PUK', columns: ['OrgUnitId', 'UserId', 'Timestamp', 'Source'])]
final class CourseAccessLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the org unit.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique identifier for the user.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Indicates the time in UTC that a user accessed the course.
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $timestamp = null;

    /**
     * The source of the course access. Only Pulse data is available at this time.
     */
    #[ORM\Column(name: 'Source', length: 40, nullable: false)]
    private ?string $source = null;

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

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }
}
