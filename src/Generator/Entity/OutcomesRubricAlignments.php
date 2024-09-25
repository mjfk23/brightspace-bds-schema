<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesRubricAlignmentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Outcomes Rubric Alignments Brightspace Data Set, each entry represents an alignment for a learning outcome to
 * a rubric criterion row. The data set only captures data from June 2021 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-rubric-alignments
 */
#[ORM\Entity(repositoryClass: OutcomesRubricAlignmentsRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_RUBRIC_ALIGNMENT')]
#[UniqueConstraint(name: 'D2L_OUTCOME_RUBRIC_ALIGNMENT_PUK', columns: ['RubricId', 'CriterionId', 'OutcomeId', 'RegistryId'])]
final class OutcomesRubricAlignments
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique rubric identifier.
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $rubricId = null;

    /**
     * Identifier for the criterion row of the rubric.
     */
    #[ORM\Column(name: 'CriterionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $criterionId = null;

    /**
     * Unique identifier for the outcome object.
     */
    #[ORM\Column(name: 'OutcomeId', type: Types::GUID, nullable: false)]
    private ?string $outcomeId = null;

    /**
     * ID of the registry for the org unit or program.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: false)]
    private ?string $registryId = null;

    /**
     * The date when the alignment of this outcome was recorded for this rubric criterion row. Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * ID of the user who initially created this alignment. Field can be null.
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
     * Set to true if the outcome alignment has been removed from the rubric or the rubric has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRubricId(): ?string
    {
        return $this->rubricId;
    }

    public function setRubricId(string $rubricId): static
    {
        $this->rubricId = $rubricId;

        return $this;
    }

    public function getCriterionId(): ?string
    {
        return $this->criterionId;
    }

    public function setCriterionId(string $criterionId): static
    {
        $this->criterionId = $criterionId;

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
