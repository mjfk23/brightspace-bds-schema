<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizUserAnswerResponsesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz User Answer Responses Brightspace Data Set returns details on how a user answered a specific quiz question.
 * Data includes whether an answer is correct and details around the quiz score. Rows in the data set are filtered out
 * if they are associated with deleted quiz questions. The Quiz User Answer Responses data set and differential is
 * limited to 3 years of data (all of the previous two calendar years and the current calendar year to date).
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-user-answer-responses
 */
#[ORM\Entity(repositoryClass: QuizUserAnswerResponsesRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_USER_ANSWER_RESPONSE')]
#[UniqueConstraint(name: 'D2L_QUIZ_USER_ANSWER_RESPONSE_PUK', columns: ['AttemptId', 'QuestionId', 'QuestionVersionId', 'AnswerId'])]
final class QuizUserAnswerResponses
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
     * Attempt number associated with the AttemptId
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: true)]
    private ?int $attemptNumber = null;

    /**
     * Unique question identifier
     */
    #[ORM\Column(name: 'QuestionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $questionId = null;

    /**
     * Unique question version identifier
     */
    #[ORM\Column(name: 'QuestionVersionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $questionVersionId = null;

    /**
     * Unique answer identifier
     */
    #[ORM\Column(name: 'AnswerId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $answerId = null;

    /**
     * Order in which quiz question options appear to the user. For example, the order in which multi-select or true
     * /false options appear. Some question types can be randomized, for example, multi-select.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Is user response correct. Field can be null.
     */
    #[ORM\Column(name: 'IsCorrect', nullable: true)]
    private ?bool $isCorrect = null;

    /**
     * Option the user chose for the question. Field can be null.
     */
    #[ORM\Column(name: 'UserSelection', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userSelection = null;

    /**
     * User answer. Field can be null.
     */
    #[ORM\Column(name: 'UserAnswer', length: 2000, nullable: true)]
    private ?string $userAnswer = null;

    /**
     * Indicates the auto generated file set ID of uploaded file(s). Field can be null.
     */
    #[ORM\Column(name: 'FileSetId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $fileSetId = null;

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

    public function getAttemptNumber(): ?int
    {
        return $this->attemptNumber;
    }

    public function setAttemptNumber(?int $attemptNumber): static
    {
        $this->attemptNumber = $attemptNumber;

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

    public function getAnswerId(): ?string
    {
        return $this->answerId;
    }

    public function setAnswerId(string $answerId): static
    {
        $this->answerId = $answerId;

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

    public function isCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setCorrect(?bool $isCorrect): static
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    public function getUserSelection(): ?string
    {
        return $this->userSelection;
    }

    public function setUserSelection(?string $userSelection): static
    {
        $this->userSelection = $userSelection;

        return $this;
    }

    public function getUserAnswer(): ?string
    {
        return $this->userAnswer;
    }

    public function setUserAnswer(?string $userAnswer): static
    {
        $this->userAnswer = $userAnswer;

        return $this;
    }

    public function getFileSetId(): ?string
    {
        return $this->fileSetId;
    }

    public function setFileSetId(?string $fileSetId): static
    {
        $this->fileSetId = $fileSetId;

        return $this;
    }
}
