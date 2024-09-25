<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricObjectLevelsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Object Levels Brightspace Data Set returns information about the rubric levels in a rubric criteria.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-object-levels
 */
#[ORM\Entity(repositoryClass: RubricObjectLevelsRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_OBJECT_LEVEL')]
#[UniqueConstraint(name: 'D2L_RUBRIC_OBJECT_LEVEL_PUK', columns: ['LevelId'])]
final class RubricObjectLevels
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique rubric Identifier
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Identifier for the level associated with the rubric
     */
    #[ORM\Column(name: 'LevelId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $levelId = null;

    /**
     * Name of the level
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Description of the level. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Automated feedback provided by the rubric for the corresponding level. Field can be null.
     */
    #[ORM\Column(name: 'Feedback', length: 2000, nullable: true)]
    private ?string $feedback = null;

    /**
     * Value assigned to the level. This is populated based on the rubric type and scoring method. Field can be null.
     */
    #[ORM\Column(name: 'Value', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $value = null;

    /**
     * Level range start value which is populated based on the rubric type and scoring method. Field can be null.
     */
    #[ORM\Column(name: 'RangeStartValue', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $rangeStartValue = null;

    /**
     * Sort order for the levels
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Identifier for the level set to which the level belongs
     */
    #[ORM\Column(name: 'LevelSetId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelSetId = null;

    /**
     * Set to true when Level Set or Level have been deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRubricId(): ?string
    {
        return $this->rubricId;
    }

    public function setRubricId(?string $rubricId): static
    {
        $this->rubricId = $rubricId;

        return $this;
    }

    public function getLevelId(): ?string
    {
        return $this->levelId;
    }

    public function setLevelId(string $levelId): static
    {
        $this->levelId = $levelId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): static
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getRangeStartValue(): ?string
    {
        return $this->rangeStartValue;
    }

    public function setRangeStartValue(?string $rangeStartValue): static
    {
        $this->rangeStartValue = $rangeStartValue;

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

    public function getLevelSetId(): ?string
    {
        return $this->levelSetId;
    }

    public function setLevelSetId(?string $levelSetId): static
    {
        $this->levelSetId = $levelSetId;

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
}
