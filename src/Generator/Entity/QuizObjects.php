<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Objects Brightspace Data Set returns information about the settings and properties of a quiz.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-objects
 */
#[ORM\Entity(repositoryClass: QuizObjectsRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_OBJECT')]
#[UniqueConstraint(name: 'D2L_QUIZ_OBJECT_PUK', columns: ['QuizId'])]
final class QuizObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique quiz identifier
     */
    #[ORM\Column(name: 'QuizId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $quizId = null;

    /**
     * Quiz name
     */
    #[ORM\Column(name: 'QuizName', length: 512, nullable: true)]
    private ?string $quizName = null;

    /**
     * Description of the Quiz. Field can be null.
     */
    #[ORM\Column(name: 'QuizDescription', length: 2000, nullable: true)]
    private ?string $quizDescription = null;

    /**
     * Category assigned to the quiz. Field can be null.
     */
    #[ORM\Column(name: 'QuizCategory', length: 512, nullable: true)]
    private ?string $quizCategory = null;

    /**
     * Indicates if the quiz is active
     */
    #[ORM\Column(name: 'IsActive', nullable: true)]
    private ?bool $isActive = null;

    /**
     * Org unit identifier associated with the quiz object
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * First time the quiz is visible. Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Last date the quiz is visible. Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Date the quiz is due (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * Date the quiz was created (UTC).
     */
    #[ORM\Column(name: 'CreationDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $creationDate = null;

    /**
     * Id of the user who created the quiz. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $createdBy = null;

    /**
     * Date when the quiz was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Id of the user who last modified the quiz. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lastModifiedBy = null;

    /**
     * Grade object identifier associated with the quiz. Field can be null.
     */
    #[ORM\Column(name: 'GradeObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $gradeObjectId = null;

    /**
     * Quiz score calculation method. Types include: Highest Attempt, Lowest Attempt, Average of all attempts, First
     * Attempt, and Last Attempt. Field can be null.
     */
    #[ORM\Column(name: 'OverallScoreCalculation', length: 46, nullable: true)]
    private ?string $overallScoreCalculation = null;

    /**
     * Denominator for the quiz score
     */
    #[ORM\Column(name: 'QuizScoreDenominator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $quizScoreDenominator = null;

    /**
     * Is a password required to access this quiz. Field can be null.
     */
    #[ORM\Column(name: 'HasPassword', nullable: true)]
    private ?bool $hasPassword = null;

    /**
     * Is this quiz available to only certain IP Addresses. Field can be null.
     */
    #[ORM\Column(name: 'IPRestricted', nullable: true)]
    private ?bool $iPRestricted = null;

    /**
     * Does this quiz have a time limit.
     */
    #[ORM\Column(name: 'TimeLimit', precision: 10, nullable: true)]
    private ?int $timeLimit = null;

    /**
     * Is the time limit assigned to this quiz enforced.
     */
    #[ORM\Column(name: 'TimeLimitEnforced', nullable: true)]
    private ?bool $timeLimitEnforced = null;

    /**
     * Number of times learners are permitted to attempt the quiz. Field can be null.
     */
    #[ORM\Column(name: 'AttemptsAllowed', precision: 10, nullable: true)]
    private ?int $attemptsAllowed = null;

    /**
     * Indicates if learners are permitted to move to previous pages in the quiz.
     */
    #[ORM\Column(name: 'PreventMovingBackwards', nullable: true)]
    private ?bool $preventMovingBackwards = null;

    /**
     * Indicates that there are hints allowed for the quiz.
     */
    #[ORM\Column(name: 'AllowHints', nullable: true)]
    private ?bool $allowHints = null;

    /**
     * Indicates that there is a notification email for this quiz. Field can be null.
     */
    #[ORM\Column(name: 'NotificationEmail', length: 2000, nullable: true)]
    private ?string $notificationEmail = null;

    /**
     * Indicates that learners cannot access the pager functionality
     */
    #[ORM\Column(name: 'DisablePagerAccess', nullable: true)]
    private ?bool $disablePagerAccess = null;

    /**
     * The quiz is not turned on in the calendar. Field can be null.
     */
    #[ORM\Column(name: 'DisplayInCalendar', nullable: true)]
    private ?bool $displayInCalendar = null;

    /**
     * Indicates that a quiz was attempted using Respondus.
     */
    #[ORM\Column(name: 'IsAttemptRldb', nullable: true)]
    private ?bool $isAttemptRldb = null;

    /**
     * Indicates that a portion of the quiz was attempted using Respondus
     */
    #[ORM\Column(name: 'IsSubviewRldb', nullable: true)]
    private ?bool $isSubviewRldb = null;

    /**
     * Display sort order used for the content objects
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Unique category identifier for the quiz. Field can be null.
     */
    #[ORM\Column(name: 'CategoryId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $categoryId = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $resultId = null;

    /**
     * Indicates if the quiz allows Retake Incorrect Only.
     */
    #[ORM\Column(name: 'IsRetakeIncorrectOnly', nullable: true)]
    private ?bool $isRetakeIncorrectOnly = null;

    /**
     * Exposes page break information from the New Quiz Experience. Possible values: Field can be null.
     */
    #[ORM\Column(name: 'PagingTypeId', precision: 10, nullable: true)]
    private ?int $pagingTypeId = null;

    /**
     * Indicates that a quiz is synchronous. A synchronous quiz's timer starts on the start date.
     */
    #[ORM\Column(name: 'IsSynchronous', nullable: true)]
    private ?bool $isSynchronous = null;

    /**
     * The percentage of a question's point value that will be deducted from the quiz attempt score if the question is
     * answered incorrectly. Field can be null.
     */
    #[ORM\Column(name: 'DeductionPercentage', precision: 10, nullable: true)]
    private ?int $deductionPercentage = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getQuizId(): ?string
    {
        return $this->quizId;
    }

    public function setQuizId(string $quizId): static
    {
        $this->quizId = $quizId;

        return $this;
    }

    public function getQuizName(): ?string
    {
        return $this->quizName;
    }

    public function setQuizName(?string $quizName): static
    {
        $this->quizName = $quizName;

        return $this;
    }

    public function getQuizDescription(): ?string
    {
        return $this->quizDescription;
    }

    public function setQuizDescription(?string $quizDescription): static
    {
        $this->quizDescription = $quizDescription;

        return $this;
    }

    public function getQuizCategory(): ?string
    {
        return $this->quizCategory;
    }

    public function setQuizCategory(?string $quizCategory): static
    {
        $this->quizCategory = $quizCategory;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

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

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

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

    public function getCreationDate(): ?\DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;

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

    public function getLastModifiedBy(): ?string
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?string $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

        return $this;
    }

    public function getGradeObjectId(): ?string
    {
        return $this->gradeObjectId;
    }

    public function setGradeObjectId(?string $gradeObjectId): static
    {
        $this->gradeObjectId = $gradeObjectId;

        return $this;
    }

    public function getOverallScoreCalculation(): ?string
    {
        return $this->overallScoreCalculation;
    }

    public function setOverallScoreCalculation(?string $overallScoreCalculation): static
    {
        $this->overallScoreCalculation = $overallScoreCalculation;

        return $this;
    }

    public function getQuizScoreDenominator(): ?string
    {
        return $this->quizScoreDenominator;
    }

    public function setQuizScoreDenominator(?string $quizScoreDenominator): static
    {
        $this->quizScoreDenominator = $quizScoreDenominator;

        return $this;
    }

    public function hasPassword(): ?bool
    {
        return $this->hasPassword;
    }

    public function setHasPassword(?bool $hasPassword): static
    {
        $this->hasPassword = $hasPassword;

        return $this;
    }

    public function isIPRestricted(): ?bool
    {
        return $this->iPRestricted;
    }

    public function setIPRestricted(?bool $iPRestricted): static
    {
        $this->iPRestricted = $iPRestricted;

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

    public function getAttemptsAllowed(): ?int
    {
        return $this->attemptsAllowed;
    }

    public function setAttemptsAllowed(?int $attemptsAllowed): static
    {
        $this->attemptsAllowed = $attemptsAllowed;

        return $this;
    }

    public function isPreventMovingBackwards(): ?bool
    {
        return $this->preventMovingBackwards;
    }

    public function setPreventMovingBackwards(?bool $preventMovingBackwards): static
    {
        $this->preventMovingBackwards = $preventMovingBackwards;

        return $this;
    }

    public function isAllowHints(): ?bool
    {
        return $this->allowHints;
    }

    public function setAllowHints(?bool $allowHints): static
    {
        $this->allowHints = $allowHints;

        return $this;
    }

    public function getNotificationEmail(): ?string
    {
        return $this->notificationEmail;
    }

    public function setNotificationEmail(?string $notificationEmail): static
    {
        $this->notificationEmail = $notificationEmail;

        return $this;
    }

    public function isDisablePagerAccess(): ?bool
    {
        return $this->disablePagerAccess;
    }

    public function setDisablePagerAccess(?bool $disablePagerAccess): static
    {
        $this->disablePagerAccess = $disablePagerAccess;

        return $this;
    }

    public function isDisplayInCalendar(): ?bool
    {
        return $this->displayInCalendar;
    }

    public function setDisplayInCalendar(?bool $displayInCalendar): static
    {
        $this->displayInCalendar = $displayInCalendar;

        return $this;
    }

    public function isAttemptRldb(): ?bool
    {
        return $this->isAttemptRldb;
    }

    public function setAttemptRldb(?bool $isAttemptRldb): static
    {
        $this->isAttemptRldb = $isAttemptRldb;

        return $this;
    }

    public function isSubviewRldb(): ?bool
    {
        return $this->isSubviewRldb;
    }

    public function setSubviewRldb(?bool $isSubviewRldb): static
    {
        $this->isSubviewRldb = $isSubviewRldb;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    public function setCategoryId(?string $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getResultId(): ?string
    {
        return $this->resultId;
    }

    public function setResultId(?string $resultId): static
    {
        $this->resultId = $resultId;

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

    public function getPagingTypeId(): ?int
    {
        return $this->pagingTypeId;
    }

    public function setPagingTypeId(?int $pagingTypeId): static
    {
        $this->pagingTypeId = $pagingTypeId;

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
