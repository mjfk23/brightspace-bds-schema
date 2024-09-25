<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMActivityAttemptsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Activity Attempts Brightspace Data Set lists each user attempt on each activity within a SCORM package, the
 * completion status, success status, and time spent for each attempt.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-activity-attempts
 */
#[ORM\Entity(repositoryClass: SCORMActivityAttemptsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_ACTIVITY_ATTEMPT')]
#[UniqueConstraint(name: 'D2L_SCORM_ACTIVITY_ATTEMPT_PUK', columns: ['VisitId', 'ActivityId', 'AttemptNumber'])]
final class SCORMActivityAttempts
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
     * Unique identifier of the activity.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::GUID, nullable: false)]
    private ?string $activityId = null;

    /**
     * Number of the attempt on the objective.
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: false)]
    private ?int $attemptNumber = null;

    /**
     * The completion status of the learner in this attempt (UNKNOWN, COMPLETED, INCOMPLETE). Field can be null.
     */
    #[ORM\Column(name: 'Completion', length: 200, nullable: true)]
    private ?string $completion = null;

    /**
     * The success status of the learner in this attempt (UNKNOWN, PASSED, FAILED). Field can be null.
     */
    #[ORM\Column(name: 'Success', length: 200, nullable: true)]
    private ?string $success = null;

    /**
     * The score achieved by the learner in this attempt, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'Score', nullable: true)]
    private ?float $score = null;

    /**
     * The raw score that the learner achieved in this attempt, between the min and max score of the activity. Field can
     * be null.
     */
    #[ORM\Column(name: 'ScoreRaw', nullable: true)]
    private ?float $scoreRaw = null;

    /**
     * The time the learner spent in this attempt, in seconds. Field can be null.
     */
    #[ORM\Column(name: 'TimeSpent', nullable: true)]
    private ?float $timeSpent = null;

    /**
     * How much of the activity was completed in this attempt, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'Progress', nullable: true)]
    private ?float $progress = null;

    /**
     * Date when the activity attempt was last modified (UTC).
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

    public function getActivityId(): ?string
    {
        return $this->activityId;
    }

    public function setActivityId(string $activityId): static
    {
        $this->activityId = $activityId;

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

    public function getCompletion(): ?string
    {
        return $this->completion;
    }

    public function setCompletion(?string $completion): static
    {
        $this->completion = $completion;

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

    public function getTimeSpent(): ?float
    {
        return $this->timeSpent;
    }

    public function setTimeSpent(?float $timeSpent): static
    {
        $this->timeSpent = $timeSpent;

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
