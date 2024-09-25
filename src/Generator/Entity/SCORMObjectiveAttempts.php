<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMObjectiveAttemptsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Objective Attempts Brightspace Data Set outputs the score and completion information on every objective
 * associated to the SCORM object where an attempt has been made.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-objective-attempts
 */
#[ORM\Entity(repositoryClass: SCORMObjectiveAttemptsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_OBJECTIVE_ATTEMPT')]
#[UniqueConstraint(name: 'D2L_SCORM_OBJECTIVE_ATTEMPT_PUK', columns: ['VisitId', 'ObjectiveId', 'AttemptNumber'])]
final class SCORMObjectiveAttempts
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the SCORM visit.
     */
    #[ORM\Column(name: 'VisitId', type: Types::GUID, nullable: false)]
    private ?string $visitId = null;

    /**
     * Unique identifier of the objective.
     */
    #[ORM\Column(name: 'ObjectiveId', type: Types::GUID, nullable: false)]
    private ?string $objectiveId = null;

    /**
     * Number of the attempt on the objective.
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: false)]
    private ?int $attemptNumber = null;

    /**
     * Number that reflects the performance of the learner on this objective, scaled to between 0 and 100. Field can be
     * null.
     */
    #[ORM\Column(name: 'Score', nullable: true)]
    private ?float $score = null;

    /**
     * Number that reflects the performance of the learner on this objective, relative to the min and max scores. Field
     * can be null.
     */
    #[ORM\Column(name: 'ScoreRaw', nullable: true)]
    private ?float $scoreRaw = null;

    /**
     * Indicates whether the learner has mastered the objective (PASSED, FAILED, UNKNOWN). Field can be null.
     */
    #[ORM\Column(name: 'Success', length: 200, nullable: true)]
    private ?string $success = null;

    /**
     * Indicates whether the learner has completed the objective (COMPLETED, INCOMPLETE, UNKNOWN, NOT_ATTEMPTED,
     * BROWSED). Field can be null.
     */
    #[ORM\Column(name: 'Completion', length: 200, nullable: true)]
    private ?string $completion = null;

    /**
     * How much of the objective was completed in this attempt, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'Progress', nullable: true)]
    private ?float $progress = null;

    /**
     * Date when the activity was last modified (UTC).
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

    public function getObjectiveId(): ?string
    {
        return $this->objectiveId;
    }

    public function setObjectiveId(string $objectiveId): static
    {
        $this->objectiveId = $objectiveId;

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

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getScoreRaw(): ?float
    {
        return $this->scoreRaw;
    }

    public function setScoreRaw(?float $scoreRaw): static
    {
        $this->scoreRaw = $scoreRaw;

        return $this;
    }

    public function getSuccess(): ?string
    {
        return $this->success;
    }

    public function setSuccess(?string $success): static
    {
        $this->success = $success;

        return $this;
    }

    public function getCompletion(): ?string
    {
        return $this->completion;
    }

    public function setCompletion(?string $completion): static
    {
        $this->completion = $completion;

        return $this;
    }

    public function getProgress(): ?float
    {
        return $this->progress;
    }

    public function setProgress(?float $progress): static
    {
        $this->progress = $progress;

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
