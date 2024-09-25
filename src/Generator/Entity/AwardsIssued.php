<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AwardsIssuedRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Awards Issued Brightspace Data Set returns a list of all the awards that have been issued for your org units. The
 * only available data for the LastModifiedDate field is from August 2023 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4520-awards-data-sets#awards-issued
 */
#[ORM\Entity(repositoryClass: AwardsIssuedRepository::class)]
#[ORM\Table(name: 'D2L_AWARD_ISSUED')]
#[UniqueConstraint(name: 'D2L_AWARD_ISSUED_PUK', columns: ['IssuedId'])]
final class AwardsIssued
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique award identifier
     */
    #[ORM\Column(name: 'AwardId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $awardId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * Issued by user ID
     */
    #[ORM\Column(name: 'IssuedBy', precision: 10, nullable: true)]
    private ?int $issuedBy = null;

    /**
     * Award issue date (UTC).
     */
    #[ORM\Column(name: 'IssueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $issueDate = null;

    /**
     * Award expiry date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'ExpiryDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $expiryDate = null;

    /**
     * Unique issued identifier
     */
    #[ORM\Column(name: 'IssuedId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $issuedId = null;

    /**
     * Indicates the criteria necessary to issue the award.
     */
    #[ORM\Column(name: 'Criteria', length: 2000, nullable: true)]
    private ?string $criteria = null;

    /**
     * Provides proof that the user has met the criteria for the award.
     */
    #[ORM\Column(name: 'Evidence', length: 2000, nullable: true)]
    private ?string $evidence = null;

    /**
     * Award revocation date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'RevokedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $revokedDate = null;

    /**
     * Reason for revoking issued award. Field can be null.
     */
    #[ORM\Column(name: 'RevokedReason', length: 2000, nullable: true)]
    private ?string $revokedReason = null;

    /**
     * User who revoked the award. Field can be null.
     */
    #[ORM\Column(name: 'RevokedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $revokedBy = null;

    /**
     * User who last modified the issued award object.
     */
    #[ORM\Column(name: 'LastModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lastModifiedBy = null;

    /**
     * Date the issued award object was last modified (UTC). Only captures data from August 2023 onwards. Field can be
     * null.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * Version number of this issued award.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAwardId(): ?string
    {
        return $this->awardId;
    }

    public function setAwardId(?string $awardId): static
    {
        $this->awardId = $awardId;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?string $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getIssuedBy(): ?int
    {
        return $this->issuedBy;
    }

    public function setIssuedBy(?int $issuedBy): static
    {
        $this->issuedBy = $issuedBy;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeImmutable
    {
        return $this->issueDate;
    }

    public function setIssueDate(?\DateTimeImmutable $issueDate): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeImmutable
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?\DateTimeImmutable $expiryDate): static
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getIssuedId(): ?string
    {
        return $this->issuedId;
    }

    public function setIssuedId(string $issuedId): static
    {
        $this->issuedId = $issuedId;

        return $this;
    }

    public function getCriteria(): ?string
    {
        return $this->criteria;
    }

    public function setCriteria(?string $criteria): static
    {
        $this->criteria = $criteria;

        return $this;
    }

    public function getEvidence(): ?string
    {
        return $this->evidence;
    }

    public function setEvidence(?string $evidence): static
    {
        $this->evidence = $evidence;

        return $this;
    }

    public function getRevokedDate(): ?\DateTimeImmutable
    {
        return $this->revokedDate;
    }

    public function setRevokedDate(?\DateTimeImmutable $revokedDate): static
    {
        $this->revokedDate = $revokedDate;

        return $this;
    }

    public function getRevokedReason(): ?string
    {
        return $this->revokedReason;
    }

    public function setRevokedReason(?string $revokedReason): static
    {
        $this->revokedReason = $revokedReason;

        return $this;
    }

    public function getRevokedBy(): ?string
    {
        return $this->revokedBy;
    }

    public function setRevokedBy(?string $revokedBy): static
    {
        $this->revokedBy = $revokedBy;

        return $this;
    }

    public function getLastModifiedBy(): ?string
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?string $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

        return $this;
    }

    public function getLastModifiedDate(): ?\DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(?\DateTimeImmutable $lastModifiedDate): static
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
