<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SurveyUserAnswersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Survey User Answers Brightspace Data Set returns data to describe how a user responded to a survey question. Rows
 * in the data set are filtered out if they are associated with deleted survey attempts.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4538-surveys-data-sets#survey-user-answers
 */
#[ORM\Entity(repositoryClass: SurveyUserAnswersRepository::class)]
#[ORM\Table(name: 'D2L_SURVEY_USER_ANSWER')]
#[UniqueConstraint(name: 'D2L_SURVEY_USER_ANSWER_PUK', columns: ['AttemptId', 'QuestionId', 'QuestionVersionId'])]
final class SurveyUserAnswers
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
     * Unique question identifier.
     */
    #[ORM\Column(name: 'QuestionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $questionId = null;

    /**
     * Unique question version identifier. Field can be null.
     */
    #[ORM\Column(name: 'QuestionVersionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $questionVersionId = null;

    /**
     * Date/time when the question was completed (UTC). No data is provided for question pools or sections. Field can be
     * null.
     */
    #[ORM\Column(name: 'TimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeCompleted = null;

    /**
     * Question number in the survey. Field can be null.
     */
    #[ORM\Column(name: 'QuestionNumber', precision: 10, nullable: true)]
    private ?int $questionNumber = null;

    /**
     * Feedback left by instructor. Field can be null.
     */
    #[ORM\Column(name: 'Comment', length: 2000, nullable: true)]
    private ?string $comment = null;

    /**
     * Sort order of the question.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Score the user received for the answer. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Page the question appeared on when the user took the survey
     */
    #[ORM\Column(name: 'Page', precision: 10, nullable: true)]
    private ?int $page = null;

    /**
     * Indicates if the survey is assigned to a user. Field can be null.
     */
    #[ORM\Column(name: 'Assigned', nullable: true)]
    private ?bool $assigned = null;

    /**
     * Indicates if the answer is deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date and time when the question answer was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Id of the user or task who last modified the question.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Date and time the survey attempt was completed (UTC).
     */
    #[ORM\Column(name: 'SurveyTimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $surveyTimeCompleted = null;

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

    public function getQuestionId(): ?string
    {
        return $this->questionId;
    }

    public function setQuestionId(string $questionId): static
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getQuestionVersionId(): ?string
    {
        return $this->questionVersionId;
    }

    public function setQuestionVersionId(string $questionVersionId): static
    {
        $this->questionVersionId = $questionVersionId;

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

    public function getQuestionNumber(): ?int
    {
        return $this->questionNumber;
    }

    public function setQuestionNumber(?int $questionNumber): static
    {
        $this->questionNumber = $questionNumber;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

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

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function isAssigned(): ?bool
    {
        return $this->assigned;
    }

    public function setAssigned(?bool $assigned): static
    {
        $this->assigned = $assigned;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

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

    public function getSurveyTimeCompleted(): ?\DateTimeImmutable
    {
        return $this->surveyTimeCompleted;
    }

    public function setSurveyTimeCompleted(?\DateTimeImmutable $surveyTimeCompleted): static
    {
        $this->surveyTimeCompleted = $surveyTimeCompleted;

        return $this;
    }
}
