<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesAlignedtoToolObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Outcomes Aligned to Tool Objects Brightspace Data Set provides details of which outcomes are aligned to which
 * assessment tools for all your org units. It includes a row for every outcome aligned to an assessment activity, for
 * both direct alignments and alignments references via rubrics. The data set only captures data from June 2021 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-aligned-to-tool-objects
 */
#[ORM\Entity(repositoryClass: OutcomesAlignedtoToolObjectsRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_ALIGNED_OBJECT')]
#[UniqueConstraint(name: 'D2L_OUTCOME_ALIGNED_OBJECT_PUK', columns: ['ObjectType', 'ObjectId', 'OutcomeId', 'RegistryId'])]
final class OutcomesAlignedtoToolObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Type of tool this outcome is aligned to. See Tool-Specific Object Lookup for details.
     */
    #[ORM\Column(name: 'ObjectType', precision: 10, nullable: false)]
    private ?int $objectType = null;

    /**
     * ID of the tool this outcome is aligned to. See Tool-Specific Object Lookup for details.
     */
    #[ORM\Column(name: 'ObjectId', length: 510, nullable: false)]
    private ?string $objectId = null;

    /**
     * ID of this Outcome in the Outcome Details data set.
     */
    #[ORM\Column(name: 'OutcomeId', type: Types::GUID, nullable: false)]
    private ?string $outcomeId = null;

    /**
     * ID of registry representing the context in which this alignment exists.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: false)]
    private ?string $registryId = null;

    /**
     * Date when this item was initially created (UTC). Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * ID of user who initially created this item. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * Date when this item was last modified (UTC). Contains created date upon creation and deleted date for deleted
     * items.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * ID of user who last modified, created, or deleted this item.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if this item has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getObjectType(): ?int
    {
        return $this->objectType;
    }

    public function setObjectType(int $objectType): static
    {
        $this->objectType = $objectType;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
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

    public function getRegistryId(): ?string
    {
        return $this->registryId;
    }

    public function setRegistryId(string $registryId): static
    {
        $this->registryId = $registryId;

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
