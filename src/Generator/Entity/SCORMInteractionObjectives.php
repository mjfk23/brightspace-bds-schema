<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMInteractionObjectivesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Interaction Objectives Brightspace Data Set defines the relationship between interactions and their
 * objectives.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-interaction-objectives
 */
#[ORM\Entity(repositoryClass: SCORMInteractionObjectivesRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_INTERACTION_OBJECTIVE')]
#[UniqueConstraint(name: 'D2L_SCORM_INTERACTION_OBJECTIVE_PUK', columns: ['InteractionId', 'ObjectiveId'])]
final class SCORMInteractionObjectives
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
     * Unique identifier of the objective.
     */
    #[ORM\Column(name: 'ObjectiveId', type: Types::GUID, nullable: false)]
    private ?string $objectiveId = null;

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

    public function getObjectiveId(): ?string
    {
        return $this->objectiveId;
    }

    public function setObjectiveId(string $objectiveId): static
    {
        $this->objectiveId = $objectiveId;

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
