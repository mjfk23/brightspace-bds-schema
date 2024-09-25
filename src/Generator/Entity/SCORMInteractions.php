<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMInteractionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Interactions Brightspace Data Set describes the runtime interactions that exist in each activity in the
 * SCORM package. Each interaction will only be known after the first user, regardless of role, attempts it.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-interactions
 */
#[ORM\Entity(repositoryClass: SCORMInteractionsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_INTERACTION')]
#[UniqueConstraint(name: 'D2L_SCORM_INTERACTION_PUK', columns: ['InteractionId'])]
final class SCORMInteractions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the interaction.
     */
    #[ORM\Column(name: 'InteractionId', type: Types::GUID, nullable: false)]
    private ?string $interactionId = null;

    /**
     * Unique identifier for each activity.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::GUID, nullable: true)]
    private ?string $activityId = null;

    /**
     * Unique label for the interaction. Field can be null.
     */
    #[ORM\Column(name: 'InternalId', length: 510, nullable: true)]
    private ?string $internalId = null;

    /**
     * The type of interaction (UNDEFINED, TRUEFALSE, CHOICE, FILLIN, LONGFILLIN, LIKERT, MATCHING, PERFORMANCE,
     * SEQUENCING, NUMERIC, OTHER).
     */
    #[ORM\Column(name: 'InteractionType', length: 200, nullable: true)]
    private ?string $interactionType = null;

    /**
     * Brief informative description of the interaction. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 500, nullable: true)]
    private ?string $description = null;

    /**
     * Weight given to the interaction relative to other interactions. Field can be null.
     */
    #[ORM\Column(name: 'Weighting', nullable: true)]
    private ?float $weighting = null;

    /**
     * JSON representation of an array of correct responses for this interaction. Field can be null.
     */
    #[ORM\Column(name: 'CorrectResponses', length: 4000, nullable: true)]
    private ?string $correctResponses = null;

    /**
     * Date when the activity was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getInteractionId(): ?string
    {
        return $this->interactionId;
    }

    public function setInteractionId(string $interactionId): static
    {
        $this->interactionId = $interactionId;

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

    public function getInteractionType(): ?string
    {
        return $this->interactionType;
    }

    public function setInteractionType(?string $interactionType): static
    {
        $this->interactionType = $interactionType;

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

    public function getWeighting(): ?float
    {
        return $this->weighting;
    }

    public function setWeighting(?float $weighting): static
    {
        $this->weighting = $weighting;

        return $this;
    }

    public function getCorrectResponses(): ?string
    {
        return $this->correctResponses;
    }

    public function setCorrectResponses(?string $correctResponses): static
    {
        $this->correctResponses = $correctResponses;

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
