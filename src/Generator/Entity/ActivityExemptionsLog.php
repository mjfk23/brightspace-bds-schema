<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ActivityExemptionsLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Activity Exemptions Log Brightspace Data Set returns details on the exemptions a user has created for your
 * organization units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4526-exemptions-data-sets#activity-exemptions-log
 */
#[ORM\Entity(repositoryClass: ActivityExemptionsLogRepository::class)]
#[ORM\Table(name: 'D2L_ACTIVITY_EXEMPTIONS_LOG')]
#[UniqueConstraint(name: 'D2L_ACTIVITY_EXEMPTIONS_LOG_PUK', columns: ['ActivityExemptionsLogId'])]
final class ActivityExemptionsLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique identifier of the object with an exemption. Field can be null.
     */
    #[ORM\Column(name: 'ObjectId', precision: 10, nullable: true)]
    private ?int $objectId = null;

    /**
     * Unique identifier for an activity associated with the exemption
     */
    #[ORM\Column(name: 'ActivityId', length: 450, nullable: true)]
    private ?string $activityId = null;

    /**
     * Name of log type. Field can be null.
     */
    #[ORM\Column(name: 'LogTypeName', length: 100, nullable: true)]
    private ?string $logTypeName = null;

    /**
     * Time of the last log entry (UTC).
     */
    #[ORM\Column(name: 'LastModifiedUtc', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedUtc = null;

    /**
     * User ID of user who last modified the exemption. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Unique exemptions log identifier
     */
    #[ORM\Column(name: 'ActivityExemptionsLogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $activityExemptionsLogId = null;

    /**
     * Unique identifier for the tool with an exemption
     */
    #[ORM\Column(name: 'ToolId', precision: 10, nullable: true)]
    private ?int $toolId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getObjectId(): ?int
    {
        return $this->objectId;
    }

    public function setObjectId(?int $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getActivityId(): ?string
    {
        return $this->activityId;
    }

    public function setActivityId(?string $activityId): static
    {
        $this->activityId = $activityId;

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

    public function getLastModifiedUtc(): ?\DateTimeImmutable
    {
        return $this->lastModifiedUtc;
    }

    public function setLastModifiedUtc(?\DateTimeImmutable $lastModifiedUtc): static
    {
        $this->lastModifiedUtc = $lastModifiedUtc;

        return $this;
    }

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

        return $this;
    }

    public function getActivityExemptionsLogId(): ?string
    {
        return $this->activityExemptionsLogId;
    }

    public function setActivityExemptionsLogId(string $activityExemptionsLogId): static
    {
        $this->activityExemptionsLogId = $activityExemptionsLogId;

        return $this;
    }

    public function getToolId(): ?int
    {
        return $this->toolId;
    }

    public function setToolId(?int $toolId): static
    {
        $this->toolId = $toolId;

        return $this;
    }
}
