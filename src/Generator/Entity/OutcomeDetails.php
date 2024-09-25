<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomeDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Outcome Details Brightspace Data Set provides details of the outcomes that are part of all registries in all your
 * org units. User IDs and dates are only populated for authored outcomes because updates to ASN outcomes rely on the
 * cache invalidation system (performed by a system user). The only available data for authored outcomes is from June
 * 2021 onwards. All data for ASN imported outcomes is available, starting with your organization's first use of
 * Learning Outcomes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcome-details
 */
#[ORM\Entity(repositoryClass: OutcomeDetailsRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_DETAIL')]
#[UniqueConstraint(name: 'D2L_OUTCOME_DETAIL_PUK', columns: ['OutcomeId'])]
final class OutcomeDetails
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique outcome identifier.
     */
    #[ORM\Column(name: 'OutcomeId', type: Types::GUID, nullable: false)]
    private ?string $outcomeId = null;

    /**
     * Provider for this outcome, e.g. ASN.
     */
    #[ORM\Column(name: 'OutcomeDefinitionSource', length: 2000, nullable: true)]
    private ?string $outcomeDefinitionSource = null;

    /**
     * ID of outcome within provider (for example ASN or locally authored). Field can be an empty string.
     */
    #[ORM\Column(name: 'OutcomeDefinitionId', length: 256, nullable: true)]
    private ?string $outcomeDefinitionId = null;

    /**
     * ID of the parent outcome, if nested under a parent outcome object in the same org unit, or null for top level
     * outcomes with no parent. Field can be null.
     */
    #[ORM\Column(name: 'ParentOutcomeId', type: Types::GUID, nullable: true)]
    private ?string $parentOutcomeId = null;

    /**
     * Main body of this outcome. Truncated to 1000 characters.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Outcome notation for ASN outcomes.
     */
    #[ORM\Column(name: 'Notation', length: 2000, nullable: true)]
    private ?string $notation = null;

    /**
     * For authored outcomes, date when this item was initially created (UTC). For imported outcomes, this field is
     * null. Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * For authored outcomes, ID of user who initially created this item. For imported outcomes, this field is null.
     * Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * Date when this item was last modified (UTC). Contains created date upon creation and deleted date for deleted
     * items. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * ID of user who last modified, created, or deleted this item. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if this item has been deleted for authored outcomes. This flag will be null for outcomes imported from
     * external providers, e.g. ASN. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOutcomeId(): ?string
    {
        return $this->outcomeId;
    }

    public function setOutcomeId(string $outcomeId): static
    {
        $this->outcomeId = $outcomeId;

        return $this;
    }

    public function getOutcomeDefinitionSource(): ?string
    {
        return $this->outcomeDefinitionSource;
    }

    public function setOutcomeDefinitionSource(?string $outcomeDefinitionSource): static
    {
        $this->outcomeDefinitionSource = $outcomeDefinitionSource;

        return $this;
    }

    public function getOutcomeDefinitionId(): ?string
    {
        return $this->outcomeDefinitionId;
    }

    public function setOutcomeDefinitionId(?string $outcomeDefinitionId): static
    {
        $this->outcomeDefinitionId = $outcomeDefinitionId;

        return $this;
    }

    public function getParentOutcomeId(): ?string
    {
        return $this->parentOutcomeId;
    }

    public function setParentOutcomeId(?string $parentOutcomeId): static
    {
        $this->parentOutcomeId = $parentOutcomeId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNotation(): ?string
    {
        return $this->notation;
    }

    public function setNotation(?string $notation): static
    {
        $this->notation = $notation;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeImmutable
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeImmutable $createdDate): static
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

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

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

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
}
