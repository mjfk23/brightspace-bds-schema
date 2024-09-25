<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AuditorRelationshipsLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Auditor Relationships Log Brightspace Data Set has a record of auditors and the users they audit in the
 * organization. The User Auditors tool must be enabled to access this data. Note: The data set may appear blank unless
 * new auditor-learner relationships are added. All historical data is populated 30 to 60 days after the November
 * 2021/20.21.11 release.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#auditor-relationships-log
 */
#[ORM\Entity(repositoryClass: AuditorRelationshipsLogRepository::class)]
#[ORM\Table(name: 'D2L_AUDITOR_RELATIONSHIPS_LOG')]
#[UniqueConstraint(name: 'D2L_AUDITOR_RELATIONSHIPS_LOG_PUK', columns: ['AuditorId', 'UserToAuditId', 'OrgUnitId', 'ModifiedDate'])]
final class AuditorRelationshipsLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * UserId (unique identifier) of the auditor.
     */
    #[ORM\Column(name: 'AuditorId', precision: 10, nullable: false)]
    private ?int $auditorId = null;

    /**
     * UserId (unique identifier) of the user to be audited by the auditor.
     */
    #[ORM\Column(name: 'UserToAuditId', precision: 10, nullable: false)]
    private ?int $userToAuditId = null;

    /**
     * Org Unit identifier where the auditor relationship exists.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * The action performed on the relationship. Either Created or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

    /**
     * UserId who modified the auditor relationship.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

    /**
     * Date and time when the auditor relationship was modified (UTC).
     */
    #[ORM\Column(name: 'ModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $modifiedDate = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAuditorId(): ?int
    {
        return $this->auditorId;
    }

    public function setAuditorId(int $auditorId): static
    {
        $this->auditorId = $auditorId;

        return $this;
    }

    public function getUserToAuditId(): ?int
    {
        return $this->userToAuditId;
    }

    public function setUserToAuditId(int $userToAuditId): static
    {
        $this->userToAuditId = $userToAuditId;

        return $this;
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

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getModifiedDate(): ?\DateTimeImmutable
    {
        return $this->modifiedDate;
    }

    public function setModifiedDate(\DateTimeImmutable $modifiedDate): static
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }
}
