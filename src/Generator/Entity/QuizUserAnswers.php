<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizUserAnswersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz User Answers Brightspace Data Set returns data to describe the option a user chose or the answer a user
 * provided for a question. Rows in the data set are filtered out if they are associated with deleted quiz questions.
 * The Quiz User Answers Brightspace Data Set contains data from 1 January 2021 onwards and adheres to the default
 * system limit of 150 million rows of the most recent data.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-user-answers
 */
#[ORM\Entity(repositoryClass: QuizUserAnswersRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_USER_ANSWER')]
#[UniqueConstraint(name: 'D2L_QUIZ_USER_ANSWER_PUK', columns: ['AttemptId', 'ObjectId'])]
final class QuizUserAnswers
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
    #[ORM\Column(name: 'QuestionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $questionId = null;

    /**
     * Unique question version identifier. Field can be null.
     */
    #[ORM\Column(name: 'QuestionVersionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $questionVersionId = null;

    /**
     * Date/time when the question was completed (UTC). No data is provided for question pools or sections. Field can be
     * null.
     */
    #[ORM\Column(name: 'TimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeCompleted = null;

    /**
     * Question number in the quiz. Field can be null.
     */
    #[ORM\Column(name: 'QuestionNumber', precision: 10, nullable: true)]
    private ?int $questionNumber = null;

    /**
     * Feedback left by instructor. Field can be null.
     */
    #[ORM\Column(name: 'Comment', length: 2000, nullable: true)]
    private ?string $comment = null;

    /**
     * Order in which quiz questions appear in the user interface. This also accounts for the ordering of sections
     * (question numbers are null for sections).
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Score the user received for the answer. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Page the question appeared on when the user took the quiz
     */
    #[ORM\Column(name: 'Page', precision: 10, nullable: true)]
    private ?int $page = null;

    /**
     * Unique section identifier. Field can be null.
     */
    #[ORM\Column(name: 'SectionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $sectionId = null;

    /**
     * Unique global identifier of the question object.
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $objectId = null;

    /**
     * The denominator of the quiz score. Field can be null.
     */
    #[ORM\Column(name: 'OutOf', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $outOf = null;

    /**
     * Quiz attempt start date and time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'TimeStarted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeStarted = null;

    /**
     * Indicates if the question is a bonus question. Field can be null.
     */
    #[ORM\Column(name: 'IsBonus', nullable: true)]
    private ?bool $isBonus = null;

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
     * Date and time a quiz attempt was completed (UTC).
     */
    #[ORM\Column(name: 'QuizTimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $quizTimeCompleted = null;

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

    public function setQuestionId(?string $questionId): static
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getQuestionVersionId(): ?string
    {
        return $this->questionVersionId;
    }

    public function setQuestionVersionId(?string $questionVersionId): static
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

    public function getSectionId(): ?string
    {
        return $this->sectionId;
    }

    public function setSectionId(?string $sectionId): static
    {
        $this->sectionId = $sectionId;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getOutOf(): ?string
    {
        return $this->outOf;
    }

    public function setOutOf(?string $outOf): static
    {
        $this->outOf = $outOf;

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

    public function isBonus(): ?bool
    {
        return $this->isBonus;
    }

    public function setBonus(?bool $isBonus): static
    {
        $this->isBonus = $isBonus;

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

    public function getQuizTimeCompleted(): ?\DateTimeImmutable
    {
        return $this->quizTimeCompleted;
    }

    public function setQuizTimeCompleted(?\DateTimeImmutable $quizTimeCompleted): static
    {
        $this->quizTimeCompleted = $quizTimeCompleted;

        return $this;
    }
}
