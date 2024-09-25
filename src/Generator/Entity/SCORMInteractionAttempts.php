<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMInteractionAttemptsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Interaction Attempts Brightspace Data Set lists the runtime interactions for each user on the activities
 * they have attempted, including their response and time spent.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-interaction-attempts
 */
#[ORM\Entity(repositoryClass: SCORMInteractionAttemptsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_INTERACTION_ATTEMPT')]
#[UniqueConstraint(name: 'D2L_SCORM_INTERACTION_ATTEMPT_PUK', columns: ['VisitId', 'InteractionId', 'AttemptNumber'])]
final class SCORMInteractionAttempts
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the visit.
     */
    #[ORM\Column(name: 'VisitId', type: Types::GUID, nullable: false)]
    private ?string $visitId = null;

    /**
     * Unique identifier of the interaction.
     */
    #[ORM\Column(name: 'InteractionId', type: Types::GUID, nullable: false)]
    private ?string $interactionId = null;

    /**
     * Number of the attempt on the interaction.
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: false)]
    private ?int $attemptNumber = null;

    /**
     * Unique identifier of the activity.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::GUID, nullable: true)]
    private ?string $activityId = null;

    /**
     * Point in time at which the interaction was first made available to the learner for learner interaction and
     * response. Field can be null.
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timestamp = null;

    /**
     * Data generated when a learner responds to an interaction. Field can be null.
     */
    #[ORM\Column(name: 'Response', length: 2000, nullable: true)]
    private ?string $response = null;

    /**
     * Judgment of the correctness of the learner response (CORRECT, INCORRECT, UNANTICIPATED, NEUTRAL). Field can be
     * null.
     */
    #[ORM\Column(name: 'Result', length: 200, nullable: true)]
    private ?string $result = null;

    /**
     * Numeric judgement of the correctness of the learner response. Field can be null.
     */
    #[ORM\Column(name: 'NumericResult', nullable: true)]
    private ?float $numericResult = null;

    /**
     * The time the learner spent in this attempt, in seconds. Field can be null.
     */
    #[ORM\Column(name: 'TimeSpent', nullable: true)]
    private ?float $timeSpent = null;

    /**
     * Date when the interaction attempt was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getVisitId(): ?string
    {
        return $this->visitId;
    }

    public function setVisitId(string $visitId): static
    {
        $this->visitId = $visitId;

        return $this;
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

    public function getAttemptNumber(): ?int
    {
        return $this->attemptNumber;
    }

    public function setAttemptNumber(int $attemptNumber): static
    {
        $this->attemptNumber = $attemptNumber;

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

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): static
    {
        $this->response = $response;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): static
    {
        $this->result = $result;

        return $this;
    }

    public function getNumericResult(): ?float
    {
        return $this->numericResult;
    }

    public function setNumericResult(?float $numericResult): static
    {
        $this->numericResult = $numericResult;

        return $this;
    }

    public function getTimeSpent(): ?float
    {
        return $this->timeSpent;
    }

    public function setTimeSpent(?float $timeSpent): static
    {
        $this->timeSpent = $timeSpent;

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
