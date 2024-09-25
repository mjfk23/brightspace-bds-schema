<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\PortfolioEvidenceObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Portfolio Evidence Objects Brightspace Data Set defines the attributes of each piece of evidence in Portfolios in
 * your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4530-portfolio-data-sets#portfolio-evidence-objects
 */
#[ORM\Entity(repositoryClass: PortfolioEvidenceObjectsRepository::class)]
#[ORM\Table(name: 'D2L_PORTFOLIO_EVIDENCE_OBJECT')]
#[UniqueConstraint(name: 'D2L_PORTFOLIO_EVIDENCE_OBJECT_PUK', columns: ['EvidenceId'])]
final class PortfolioEvidenceObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique evidence identifier
     */
    #[ORM\Column(name: 'EvidenceId', type: Types::GUID, nullable: false)]
    private ?string $evidenceId = null;

    /**
     * The user ID that this evidence belongs to
     */
    #[ORM\Column(name: 'OwnerId', precision: 10, nullable: true)]
    private ?int $ownerId = null;

    /**
     * Unique org unit identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The type of evidence
     */
    #[ORM\Column(name: 'EvidenceType', length: 60, nullable: true)]
    private ?string $evidenceType = null;

    /**
     * The evidence title
     */
    #[ORM\Column(name: 'Title', length: 2000, nullable: true)]
    private ?string $title = null;

    /**
     * Indicates the evidence is approved
     */
    #[ORM\Column(name: 'IsApproved', nullable: true)]
    private ?bool $isApproved = null;

    /**
     * Indicates the evidence is spotlighted
     */
    #[ORM\Column(name: 'IsSpotlighted', nullable: true)]
    private ?bool $isSpotlighted = null;

    /**
     * Indicates the evidence is shared to parents
     */
    #[ORM\Column(name: 'IsSharedToParents', nullable: true)]
    private ?bool $isSharedToParents = null;

    /**
     * Indicates that the evidence object is deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates that the deleted evidence object can be recovered by the instructor. Field can be null.
     */
    #[ORM\Column(name: 'IsRecoverableByInstructor', nullable: true)]
    private ?bool $isRecoverableByInstructor = null;

    /**
     * Date when the evidence object was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the evidence object
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates the evidence is shared to instructors. Field can be null.
     */
    #[ORM\Column(name: 'IsSharedWithInstructor', nullable: true)]
    private ?bool $isSharedWithInstructor = null;

    /**
     * Date when the evidence was most recently shared to instructors (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateSharedWithInstructor', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateSharedWithInstructor = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getEvidenceId(): ?string
    {
        return $this->evidenceId;
    }

    public function setEvidenceId(string $evidenceId): static
    {
        $this->evidenceId = $evidenceId;

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    public function setOwnerId(?int $ownerId): static
    {
        $this->ownerId = $ownerId;

        return $this;
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

    public function getEvidenceType(): ?string
    {
        return $this->evidenceType;
    }

    public function setEvidenceType(?string $evidenceType): static
    {
        $this->evidenceType = $evidenceType;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function isApproved(): ?bool
    {
        return $this->isApproved;
    }

    public function setApproved(?bool $isApproved): static
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    public function isSpotlighted(): ?bool
    {
        return $this->isSpotlighted;
    }

    public function setSpotlighted(?bool $isSpotlighted): static
    {
        $this->isSpotlighted = $isSpotlighted;

        return $this;
    }

    public function isSharedToParents(): ?bool
    {
        return $this->isSharedToParents;
    }

    public function setSharedToParents(?bool $isSharedToParents): static
    {
        $this->isSharedToParents = $isSharedToParents;

        return $this;
    }

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function isRecoverableByInstructor(): ?bool
    {
        return $this->isRecoverableByInstructor;
    }

    public function setRecoverableByInstructor(?bool $isRecoverableByInstructor): static
    {
        $this->isRecoverableByInstructor = $isRecoverableByInstructor;

        return $this;
    }

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

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

    public function isSharedWithInstructor(): ?bool
    {
        return $this->isSharedWithInstructor;
    }

    public function setSharedWithInstructor(?bool $isSharedWithInstructor): static
    {
        $this->isSharedWithInstructor = $isSharedWithInstructor;

        return $this;
    }

    public function getDateSharedWithInstructor(): ?\DateTimeImmutable
    {
        return $this->dateSharedWithInstructor;
    }

    public function setDateSharedWithInstructor(?\DateTimeImmutable $dateSharedWithInstructor): static
    {
        $this->dateSharedWithInstructor = $dateSharedWithInstructor;

        return $this;
    }
}
