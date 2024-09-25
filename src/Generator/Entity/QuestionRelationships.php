<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuestionRelationshipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Question Relationships Brightspace Data Set details which quizzes, sections, question pools, surveys, or
 * self-assessments the questions in Question Library have been added to.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4531-questions-data-sets#question-relationships
 */
#[ORM\Entity(repositoryClass: QuestionRelationshipsRepository::class)]
#[ORM\Table(name: 'D2L_QUESTION_RELATIONSHIP')]
final class QuestionRelationships
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique question collection identifier
     */
    #[ORM\Column(name: 'CollectionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $collectionId = null;

    /**
     * Unique question identifier. Field can be null.
     */
    #[ORM\Column(name: 'QuestionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $questionId = null;

    /**
     * Unique question version identifier. Each time you edit a quiz, survey, or self-assessment question, a new version
     * of that question is created, indicated by the QuestionVersionID field. Field can be null.
     */
    #[ORM\Column(name: 'QuestionVersionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $questionVersionId = null;

    /**
     * Order in which questions appear in the user interface. If the question is within a section, the Order field uses
     * the section's order in the user interface.
     */
    #[ORM\Column(name: 'Order', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $order = null;

    /**
     * Unique section identifier. Field can be null.
     */
    #[ORM\Column(name: 'SectionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $sectionId = null;

    /**
     * Indicates if the question pool is a random section.
     */
    #[ORM\Column(name: 'IsQuestionPool', nullable: true)]
    private ?bool $isQuestionPool = null;

    /**
     * Date the question was created (UTC)
     */
    #[ORM\Column(name: 'CreationDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $creationDate = null;

    /**
     * Id of the user who created the quiz, section, question pool, survey, or self-assessment. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $createdBy = null;

    /**
     * Date when the quiz, section, question pool, survey, or self-assessment was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Id of the user who last modified the quiz, section, question pool, survey, or self-assessment. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lastModifiedBy = null;

    /**
     * Possible points for the question. Field can be null.
     */
    #[ORM\Column(name: 'Points', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $points = null;

    /**
     * Difficulty level assigned to the question. Field can be null.
     */
    #[ORM\Column(name: 'Difficulty', precision: 10, nullable: true)]
    private ?int $difficulty = null;

    /**
     * Indicates if the question is a bonus question. Field can be null.
     */
    #[ORM\Column(name: 'IsBonus', nullable: true)]
    private ?bool $isBonus = null;

    /**
     * Indicates if the question is mandatory. Field can be null.
     */
    #[ORM\Column(name: 'IsMandatory', nullable: true)]
    private ?bool $isMandatory = null;

    /**
     * Indicates if the question is deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the version of the question. This column supports the Question Pools information in the Assessment
     * Quality Dashboard. Field can be null.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Unique identifier of the question.
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getCollectionId(): ?string
    {
        return $this->collectionId;
    }

    public function setCollectionId(?string $collectionId): static
    {
        $this->collectionId = $collectionId;

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

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): static
    {
        $this->order = $order;

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

    public function isQuestionPool(): ?bool
    {
        return $this->isQuestionPool;
    }

    public function setQuestionPool(?bool $isQuestionPool): static
    {
        $this->isQuestionPool = $isQuestionPool;

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

    public function getPoints(): ?string
    {
        return $this->points;
    }

    public function setPoints(?string $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(?int $difficulty): static
    {
        $this->difficulty = $difficulty;

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

    public function isMandatory(): ?bool
    {
        return $this->isMandatory;
    }

    public function setMandatory(?bool $isMandatory): static
    {
        $this->isMandatory = $isMandatory;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(?string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }
}
