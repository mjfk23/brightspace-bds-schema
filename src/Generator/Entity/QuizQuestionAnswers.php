<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizQuestionAnswersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Question Answers Brightspace Data Set returns possible answers for a given quiz question. This includes
 * questions in sections or question pools.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-question-answers
 */
#[ORM\Entity(repositoryClass: QuizQuestionAnswersRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_QUESTION_ANSWER')]
#[UniqueConstraint(name: 'D2L_QUIZ_QUESTION_ANSWER_PUK', columns: ['AnswerId', 'QuestionId', 'QuestionVersionId', 'ObjectId'])]
final class QuizQuestionAnswers
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique answer identifier
     */
    #[ORM\Column(name: 'AnswerId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $answerId = null;

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
     * Order in which the quiz answers are displayed or correct answer order for ordering questions.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Is answer correct. Field can be null.
     */
    #[ORM\Column(name: 'IsCorrect', nullable: true)]
    private ?bool $isCorrect = null;

    /**
     * Weight associated with answer. Field can be null.
     */
    #[ORM\Column(name: 'Weight', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weight = null;

    /**
     * Answer text. Field can be null.
     */
    #[ORM\Column(name: 'Answer', length: 2000, nullable: true)]
    private ?string $answer = null;

    /**
     * Instructor comment on the answer. Field can be null.
     */
    #[ORM\Column(name: 'Comment', length: 2000, nullable: true)]
    private ?string $comment = null;

    /**
     * System description for the type of answer expected.
     */
    #[ORM\Column(name: 'Description', length: 512, nullable: true)]
    private ?string $description = null;

    /**
     * Unique identifier of the answer
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $objectId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): static
    {
        $this->answer = $answer;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
}
