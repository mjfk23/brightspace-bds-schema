<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesDemonstrationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Outcomes Demonstrations Brightspace Data Set, each entry represents an evaluation of an assessment activity
 * that is aligned to a learning outcome. For most tool object types, assessments are only visible in this data set when
 * they are made visible to learners. The data set only captures data from June 2021 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-demonstrations
 */
#[ORM\Entity(repositoryClass: OutcomesDemonstrationsRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_DEMONSTRATION')]
#[UniqueConstraint(name: 'D2L_OUTCOME_DEMONSTRATION_PUK', columns: ['DemonstrationId'])]
final class OutcomesDemonstrations
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID of this demonstration.
     */
    #[ORM\Column(name: 'DemonstrationId', type: Types::GUID, nullable: false)]
    private ?string $demonstrationId = null;

    /**
     * Result of this evaluation if manually entered by assessor. Field can be null if achieved level has not been
     * manually overridden.
     */
    #[ORM\Column(name: 'ExplicitlyEnteredScaleLevelId', type: Types::GUID, nullable: true)]
    private ?string $explicitlyEnteredScaleLevelId = null;

    /**
     * Result of this evaluation if automatically generated by LMS. Field can be null.
     */
    #[ORM\Column(name: 'AutomaticallyGeneratedScaleLevelId', type: Types::GUID, nullable: true)]
    private ?string $automaticallyGeneratedScaleLevelId = null;

    /**
     * Type of assessed tool for this demonstration. See Tool-Specific Object Lookup for details.
     */
    #[ORM\Column(name: 'AlignedObjectType', precision: 10, nullable: true)]
    private ?int $alignedObjectType = null;

    /**
     * ID of assessed tool for this demonstration. See Tool-Specific Object Lookup for details.
     */
    #[ORM\Column(name: 'AlignedObjectId', length: 2000, nullable: true)]
    private ?string $alignedObjectId = null;

    /**
     * ID of assessed outcome.
     */
    #[ORM\Column(name: 'OutcomeId', type: Types::GUID, nullable: true)]
    private ?string $outcomeId = null;

    /**
     * ID of registry representing the context in which the demonstration was made.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: true)]
    private ?string $registryId = null;

    /**
     * Indicates if this demonstration has been made available to the assessed learner. Field can be null.
     */
    #[ORM\Column(name: 'IsPublished', nullable: true)]
    private ?bool $isPublished = null;

    /**
     * ID of the user who made the submission.
     */
    #[ORM\Column(name: 'AssessedUserId', precision: 10, nullable: true)]
    private ?int $assessedUserId = null;

    /**
     * Date of initial assessment (UTC).
     */
    #[ORM\Column(name: 'AssessedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $assessedDate = null;

    /**
     * ID of the user who initially evaluated the submission. Field can be null.
     */
    #[ORM\Column(name: 'AssessorUserId', precision: 10, nullable: true)]
    private ?int $assessorUserId = null;

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

    public function getDemonstrationId(): ?string
    {
        return $this->demonstrationId;
    }

    public function setDemonstrationId(string $demonstrationId): static
    {
        $this->demonstrationId = $demonstrationId;

        return $this;
    }

    public function getExplicitlyEnteredScaleLevelId(): ?string
    {
        return $this->explicitlyEnteredScaleLevelId;
    }

    public function setExplicitlyEnteredScaleLevelId(?string $explicitlyEnteredScaleLevelId): static
    {
        $this->explicitlyEnteredScaleLevelId = $explicitlyEnteredScaleLevelId;

        return $this;
    }

    public function getAutomaticallyGeneratedScaleLevelId(): ?string
    {
        return $this->automaticallyGeneratedScaleLevelId;
    }

    public function setAutomaticallyGeneratedScaleLevelId(?string $automaticallyGeneratedScaleLevelId): static
    {
        $this->automaticallyGeneratedScaleLevelId = $automaticallyGeneratedScaleLevelId;

        return $this;
    }

    public function getAlignedObjectType(): ?int
    {
        return $this->alignedObjectType;
    }

    public function setAlignedObjectType(?int $alignedObjectType): static
    {
        $this->alignedObjectType = $alignedObjectType;

        return $this;
    }

    public function getAlignedObjectId(): ?string
    {
        return $this->alignedObjectId;
    }

    public function setAlignedObjectId(?string $alignedObjectId): static
    {
        $this->alignedObjectId = $alignedObjectId;

        return $this;
    }

    public function getOutcomeId(): ?string
    {
        return $this->outcomeId;
    }

    public function setOutcomeId(?string $outcomeId): static
    {
        $this->outcomeId = $outcomeId;

        return $this;
    }

    public function getRegistryId(): ?string
    {
        return $this->registryId;
    }

    public function setRegistryId(?string $registryId): static
    {
        $this->registryId = $registryId;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(?bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getAssessedUserId(): ?int
    {
        return $this->assessedUserId;
    }

    public function setAssessedUserId(?int $assessedUserId): static
    {
        $this->assessedUserId = $assessedUserId;

        return $this;
    }

    public function getAssessedDate(): ?\DateTimeImmutable
    {
        return $this->assessedDate;
    }

    public function setAssessedDate(?\DateTimeImmutable $assessedDate): static
    {
        $this->assessedDate = $assessedDate;

        return $this;
    }

    public function getAssessorUserId(): ?int
    {
        return $this->assessorUserId;
    }

    public function setAssessorUserId(?int $assessorUserId): static
    {
        $this->assessorUserId = $assessorUserId;

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
