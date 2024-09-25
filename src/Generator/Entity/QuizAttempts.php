<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizAttemptsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Attempts Brightspace Data Set returns details for each user quiz attempt for all your org units. This data
 * set includes completed quiz attempts and in-progress quiz attempts.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-attempts
 */
#[ORM\Entity(repositoryClass: QuizAttemptsRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_ATTEMPT')]
#[UniqueConstraint(name: 'D2L_QUIZ_ATTEMPT_PUK', columns: ['AttemptId'])]
final class QuizAttempts
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique attempt identifier
     */
    #[ORM\Column(name: 'AttemptId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $attemptId = null;

    /**
     * Unique quiz identifier
     */
    #[ORM\Column(name: 'QuizId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $quizId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Attempt number for the quiz
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: true)]
    private ?int $attemptNumber = null;

    /**
     * Quiz attempt start time (UTC).
     */
    #[ORM\Column(name: 'TimeStarted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeStarted = null;

    /**
     * Quiz attempt completion time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'TimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeCompleted = null;

    /**
     * Score for the attempt. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * If a quiz has been graded
     */
    #[ORM\Column(name: 'IsGraded', nullable: true)]
    private ?bool $isGraded = null;

    /**
     * Number of previous times a learner has attempted the quiz. Field can be null.
     */
    #[ORM\Column(name: 'OldAttemptNumber', precision: 10, nullable: true)]
    private ?int $oldAttemptNumber = null;

    /**
     * Indicates that the quiz attempt is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the total possible value of the quiz attempt. This should indicate what the quiz "out of" score is,
     * even if the quiz total possible value changes after the attempt is made. Field can be null.
     */
    #[ORM\Column(name: 'PossibleScore', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $possibleScore = null;

    /**
     * Indicates if this attempt only includes questions that were incorrect on a previous attempt.
     */
    #[ORM\Column(name: 'IsRetakeIncorrectOnly', nullable: true)]
    private ?bool $isRetakeIncorrectOnly = null;

    /**
     * Quiz attempt due date (UTC). Based on when the learner begins the attempt, even if the instructor changes the
     * quiz due date later. Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * Amount of time, in minutes, that a learner has to complete the quiz attempt. Based on when the learner begins the
     * attempt, even if the instructor changes the quiz time limit later. Field can be null.
     */
    #[ORM\Column(name: 'TimeLimit', precision: 10, nullable: true)]
    private ?int $timeLimit = null;

    /**
     * Indicates whether the time limit on this quiz attempt is enforced. Based on when the learner begins the attempt,
     * even if the instructor changes the time limit enforced setting later. Field can be null.
     */
    #[ORM\Column(name: 'TimeLimitEnforced', nullable: true)]
    private ?bool $timeLimitEnforced = null;

    /**
     * If the time limit is enforced for this attempt, indicates the desired behavior when the time limit is exceeded.
     * Field can be null.
     */
    #[ORM\Column(name: 'TimeLimitExceededBehaviour', length: 256, nullable: true)]
    private ?string $timeLimitExceededBehaviour = null;

    /**
     * Indicates that a quiz attempt is synchronous. A synchronous quiz's timer starts on the start date.
     */
    #[ORM\Column(name: 'IsSynchronous', nullable: true)]
    private ?bool $isSynchronous = null;

    /**
     * The percentage of a question's point value that is deducted from the quiz attempt score if the question is
     * answered incorrectly. This value remains constant once the learner begins the attempt, even if the instructor
     * changes the deduction percentage later. Field can be null.
     */
    #[ORM\Column(name: 'DeductionPercentage', precision: 10, nullable: true)]
    private ?int $deductionPercentage = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAttemptId(): ?string
    {
        return $this->attemptId;
    }

    public function setAttemptId(string $attemptId): static
    {
        $this->attemptId = $attemptId;

        return $this;
    }

    public function getQuizId(): ?string
    {
        return $this->quizId;
    }

    public function setQuizId(?string $quizId): static
    {
        $this->quizId = $quizId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getAttemptNumber(): ?int
    {
        return $this->attemptNumber;
    }

    public function setAttemptNumber(?int $attemptNumber): static
    {
        $this->attemptNumber = $attemptNumber;

        return $this;
    }

    public function getTimeStarted(): ?\DateTimeImmutable
    {
        return $this->timeStarted;
    }

    public function setTimeStarted(?\DateTimeImmutable $timeStarted): static
    {
        $this->timeStarted = $timeStarted;

        return $this;
    }

    public function getTimeCompleted(): ?\DateTimeImmutable
    {
        return $this->timeCompleted;
    }

    public function setTimeCompleted(?\DateTimeImmutable $timeCompleted): static
    {
        $this->timeCompleted = $timeCompleted;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function isGraded(): ?bool
    {
        return $this->isGraded;
    }

    public function setGraded(?bool $isGraded): static
    {
        $this->isGraded = $isGraded;

        return $this;
    }

    public function getOldAttemptNumber(): ?int
    {
        return $this->oldAttemptNumber;
    }

    public function setOldAttemptNumber(?int $oldAttemptNumber): static
    {
        $this->oldAttemptNumber = $oldAttemptNumber;

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

    public function getPossibleScore(): ?string
    {
        return $this->possibleScore;
    }

    public function setPossibleScore(?string $possibleScore): static
    {
        $this->possibleScore = $possibleScore;

        return $this;
    }

    public function isRetakeIncorrectOnly(): ?bool
    {
        return $this->isRetakeIncorrectOnly;
    }

    public function setRetakeIncorrectOnly(?bool $isRetakeIncorrectOnly): static
    {
        $this->isRetakeIncorrectOnly = $isRetakeIncorrectOnly;

        return $this;
    }

    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeImmutable $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getTimeLimit(): ?int
    {
        return $this->timeLimit;
    }

    public function setTimeLimit(?int $timeLimit): static
    {
        $this->timeLimit = $timeLimit;

        return $this;
    }

    public function isTimeLimitEnforced(): ?bool
    {
        return $this->timeLimitEnforced;
    }

    public function setTimeLimitEnforced(?bool $timeLimitEnforced): static
    {
        $this->timeLimitEnforced = $timeLimitEnforced;

        return $this;
    }

    public function getTimeLimitExceededBehaviour(): ?string
    {
        return $this->timeLimitExceededBehaviour;
    }

    public function setTimeLimitExceededBehaviour(?string $timeLimitExceededBehaviour): static
    {
        $this->timeLimitExceededBehaviour = $timeLimitExceededBehaviour;

        return $this;
    }

    public function isSynchronous(): ?bool
    {
        return $this->isSynchronous;
    }

    public function setSynchronous(?bool $isSynchronous): static
    {
        $this->isSynchronous = $isSynchronous;

        return $this;
    }

    public function getDeductionPercentage(): ?int
    {
        return $this->deductionPercentage;
    }

    public function setDeductionPercentage(?int $deductionPercentage): static
    {
        $this->deductionPercentage = $deductionPercentage;

        return $this;
    }
}
