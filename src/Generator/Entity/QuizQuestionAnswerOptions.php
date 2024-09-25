<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizQuestionAnswerOptionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Question Answer Options Brightspace Data Set returns possible options for a given quiz answer. Only includes
 * answer options for these question types: Short Answer, Fill in the Blanks, and Multi-Short Answer. Rows in the data
 * set are filtered out if they are associated with deleted quiz attempts.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-question-answer-options
 */
#[ORM\Entity(repositoryClass: QuizQuestionAnswerOptionsRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_QUESTION_ANSWER_OPTION')]
#[UniqueConstraint(name: 'D2L_QUIZ_QUESTION_ANSWER_OPTION_PUK', columns: ['AnswerId', 'QuestionId', 'QuestionVersionId', 'QuizObjectId', 'AnswerOptionId'])]
final class QuizQuestionAnswerOptions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique answer Identifier
     */
    #[ORM\Column(name: 'AnswerId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $answerId = null;

    /**
     * User answer. Field can be null.
     */
    #[ORM\Column(name: 'AnswerText', length: 2000, nullable: true)]
    private ?string $answerText = null;

    /**
     * Weight associated with the answer
     */
    #[ORM\Column(name: 'Weight', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weight = null;

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
     * Unique quiz object identifier
     */
    #[ORM\Column(name: 'QuizObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $quizObjectId = null;

    /**
     * Unique answer option identifier
     */
    #[ORM\Column(name: 'AnswerOptionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $answerOptionId = null;

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

    public function getAnswerText(): ?string
    {
        return $this->answerText;
    }

    public function setAnswerText(?string $answerText): static
    {
        $this->answerText = $answerText;

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

    public function getQuizObjectId(): ?string
    {
        return $this->quizObjectId;
    }

    public function setQuizObjectId(string $quizObjectId): static
    {
        $this->quizObjectId = $quizObjectId;

        return $this;
    }

    public function getAnswerOptionId(): ?string
    {
        return $this->answerOptionId;
    }

    public function setAnswerOptionId(string $answerOptionId): static
    {
        $this->answerOptionId = $answerOptionId;

        return $this;
    }
}
