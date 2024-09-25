<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyActivityLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Activity Log Brightspace Data Set records changes as competencies are mapped to specific activities.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-activity-log
 */
#[ORM\Entity(repositoryClass: CompetencyActivityLogRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_ACTIVITY_LOG')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_ACTIVITY_LOG_PUK', columns: ['ActivityId', 'ActivityLogId'])]
final class CompetencyActivityLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique activity identifier
     */
    #[ORM\Column(name: 'ActivityId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $activityId = null;

    /**
     * Unique identifier for the activity log
     */
    #[ORM\Column(name: 'ActivityLogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $activityLogId = null;

    /**
     * Log type identifier
     */
    #[ORM\Column(name: 'LogTypeId', precision: 10, nullable: true)]
    private ?int $logTypeId = null;

    /**
     * Name of the log type. Field can be null.
     */
    #[ORM\Column(name: 'LogTypeName', length: 38, nullable: true)]
    private ?string $logTypeName = null;

    /**
     * Time and date of the entry in the log
     */
    #[ORM\Column(name: 'LogDateTime', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $logDateTime = null;

    /**
     * User who modified the competency structure.
     */
    #[ORM\Column(name: 'ModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $modifiedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getActivityId(): ?string
    {
        return $this->activityId;
    }

    public function setActivityId(string $activityId): static
    {
        $this->activityId = $activityId;

        return $this;
    }

    public function getActivityLogId(): ?string
    {
        return $this->activityLogId;
    }

    public function setActivityLogId(string $activityLogId): static
    {
        $this->activityLogId = $activityLogId;

        return $this;
    }

    public function getLogTypeId(): ?int
    {
        return $this->logTypeId;
    }

    public function setLogTypeId(?int $logTypeId): static
    {
        $this->logTypeId = $logTypeId;

        return $this;
    }

    public function getLogTypeName(): ?string
    {
        return $this->logTypeName;
    }

    public function setLogTypeName(?string $logTypeName): static
    {
        $this->logTypeName = $logTypeName;

        return $this;
    }

    public function getLogDateTime(): ?\DateTimeImmutable
    {
        return $this->logDateTime;
    }

    public function setLogDateTime(?\DateTimeImmutable $logDateTime): static
    {
        $this->logDateTime = $logDateTime;

        return $this;
    }

    public function getModifiedBy(): ?string
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }
}
