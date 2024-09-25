<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CPDQuestionAnswersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The CPD Question Answers Brightspace Data Set returns a list of all answers provided by each user per CPD record for
 * the CPD questions defined for the CPD tool.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26020-continuous-professional-development-cpd-data-sets#cpd-question-answers
 */
#[ORM\Entity(repositoryClass: CPDQuestionAnswersRepository::class)]
#[ORM\Table(name: 'D2L_CPD_QUESTION_ANSWER')]
#[UniqueConstraint(name: 'D2L_CPD_QUESTION_ANSWER_PUK', columns: ['AnswerId'])]
final class CPDQuestionAnswers
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each answer to a question.
     */
    #[ORM\Column(name: 'AnswerId', precision: 10, nullable: false)]
    private ?int $answerId = null;

    /**
     * The text containing the answer to the question.
     */
    #[ORM\Column(name: 'AnswerText', length: 4000, nullable: true)]
    private ?string $answerText = null;

    /**
     * Unique identifier for the question.
     */
    #[ORM\Column(name: 'QuestionId', precision: 10, nullable: true)]
    private ?int $questionId = null;

    /**
     * Unique identifier of the Record where the action occurred.
     */
    #[ORM\Column(name: 'RecordId', precision: 10, nullable: true)]
    private ?int $recordId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * The action that occurred: Created, Updated or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

    /**
     * The date and time (UTC) the answer was added or last updated. Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * The date and time (UTC) the answer was deleted. Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAnswerId(): ?int
    {
        return $this->answerId;
    }

    public function setAnswerId(int $answerId): static
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

    public function getQuestionId(): ?int
    {
        return $this->questionId;
    }

    public function setQuestionId(?int $questionId): static
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getRecordId(): ?int
    {
        return $this->recordId;
    }

    public function setRecordId(?int $recordId): static
    {
        $this->recordId = $recordId;

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

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): static
    {
        $this->action = $action;

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

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
