<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMObjectivesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Objectives Brightspace Data Set describes the global, activity, and runtime interactions that exist for
 * each SCORM package. The objectives will only be known after the first user registration or visit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-objectives
 */
#[ORM\Entity(repositoryClass: SCORMObjectivesRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_OBJECTIVE')]
#[UniqueConstraint(name: 'D2L_SCORM_OBJECTIVE_PUK', columns: ['ObjectiveId'])]
final class SCORMObjectives
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the objective.
     */
    #[ORM\Column(name: 'ObjectiveId', type: Types::GUID, nullable: false)]
    private ?string $objectiveId = null;

    /**
     * Unique identifier for each SCORM object.
     */
    #[ORM\Column(name: 'ScormObjectId', type: Types::GUID, nullable: true)]
    private ?string $scormObjectId = null;

    /**
     * Type of objective (GLOBAL, ACTIVITY, RUNTIME).
     */
    #[ORM\Column(name: 'ObjectiveType', length: 200, nullable: true)]
    private ?string $objectiveType = null;

    /**
     * Unique identifier for each activity. Field can be null.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::GUID, nullable: true)]
    private ?string $activityId = null;

    /**
     * Unique label for the objective. Field can be null.
     */
    #[ORM\Column(name: 'InternalId', length: 510, nullable: true)]
    private ?string $internalId = null;

    /**
     * Whether this is the primary objective of the activity. Field can be null.
     */
    #[ORM\Column(name: 'IsPrimary', nullable: true)]
    private ?bool $isPrimary = null;

    /**
     * Brief informative description of the objective. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 500, nullable: true)]
    private ?string $description = null;

    /**
     * Minimum value, for the objective, in the range for the raw score. Field can be null.
     */
    #[ORM\Column(name: 'ScoreMin', nullable: true)]
    private ?float $scoreMin = null;

    /**
     * Maximum value, for the objective, in the range for the raw score. Field can be null.
     */
    #[ORM\Column(name: 'ScoreMax', nullable: true)]
    private ?float $scoreMax = null;

    /**
     * Date when the activity was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getObjectiveId(): ?string
    {
        return $this->objectiveId;
    }

    public function setObjectiveId(string $objectiveId): static
    {
        $this->objectiveId = $objectiveId;

        return $this;
    }

    public function getScormObjectId(): ?string
    {
        return $this->scormObjectId;
    }

    public function setScormObjectId(?string $scormObjectId): static
    {
        $this->scormObjectId = $scormObjectId;

        return $this;
    }

    public function getObjectiveType(): ?string
    {
        return $this->objectiveType;
    }

    public function setObjectiveType(?string $objectiveType): static
    {
        $this->objectiveType = $objectiveType;

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

    public function getInternalId(): ?string
    {
        return $this->internalId;
    }

    public function setInternalId(?string $internalId): static
    {
        $this->internalId = $internalId;

        return $this;
    }

    public function isPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    public function setPrimary(?bool $isPrimary): static
    {
        $this->isPrimary = $isPrimary;

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

    public function getScoreMin(): ?float
    {
        return $this->scoreMin;
    }

    public function setScoreMin(?float $scoreMin): static
    {
        $this->scoreMin = $scoreMin;

        return $this;
    }

    public function getScoreMax(): ?float
    {
        return $this->scoreMax;
    }

    public function setScoreMax(?float $scoreMax): static
    {
        $this->scoreMax = $scoreMax;

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
}
