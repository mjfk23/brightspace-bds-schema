<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricCriteriaLevelsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Criteria Levels Brightspace Data Set returns the details for all rubric criteria and associated levels
 * where they exist.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-criteria-levels
 */
#[ORM\Entity(repositoryClass: RubricCriteriaLevelsRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_CRITERIA_LEVEL')]
#[UniqueConstraint(name: 'D2L_RUBRIC_CRITERIA_LEVEL_PUK', columns: ['RubricId', 'CriterionId', 'LevelId'])]
final class RubricCriteriaLevels
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique rubric identifier
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $rubricId = null;

    /**
     * Identifier for the criterion associated with the rubric levels
     */
    #[ORM\Column(name: 'CriterionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $criterionId = null;

    /**
     * Description of the criterion. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Automated feedback provided by the rubric for the rubric criterion. Field can be null.
     */
    #[ORM\Column(name: 'Feedback', length: 2000, nullable: true)]
    private ?string $feedback = null;

    /**
     * Value assigned to the criterion in the rubric. This is populated based on the rubric type and the scoring method.
     * Field can be null
     */
    #[ORM\Column(name: 'Value', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $value = null;

    /**
     * Identifier of the level associated with the criterion
     */
    #[ORM\Column(name: 'LevelId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $levelId = null;

    /**
     * Set to true if the criterion has been deleted
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

    public function setRubricId(string $rubricId): static
    {
        $this->rubricId = $rubricId;

        return $this;
    }

    public function getCriterionId(): ?string
    {
        return $this->criterionId;
    }

    public function setCriterionId(string $criterionId): static
    {
        $this->criterionId = $criterionId;

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

    public function getLevelId(): ?string
    {
        return $this->levelId;
    }

    public function setLevelId(string $levelId): static
    {
        $this->levelId = $levelId;

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
