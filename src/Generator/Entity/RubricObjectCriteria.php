<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricObjectCriteriaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Object Criteria Brightspace Data Set returns information about the rubric criteria within a rubric.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-object-criteria
 */
#[ORM\Entity(repositoryClass: RubricObjectCriteriaRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_OBJECT_CRITERIA')]
#[UniqueConstraint(name: 'D2L_RUBRIC_OBJECT_CRITERIA_PUK', columns: ['CriterionId'])]
final class RubricObjectCriteria
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique rubric identifier
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Identifier for the criterion associated with the rubric levels
     */
    #[ORM\Column(name: 'CriterionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $criterionId = null;

    /**
     * Name of the criterion.
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Sort order by which the criteria is listed
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Identifier for the criterion group to which the criterion belongs
     */
    #[ORM\Column(name: 'CriteriaGroupId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $criteriaGroupId = null;

    /**
     * Name of the criterion group.
     */
    #[ORM\Column(name: 'GroupName', length: 512, nullable: true)]
    private ?string $groupName = null;

    /**
     * Sort order assigned to the criterion group
     */
    #[ORM\Column(name: 'GroupSortOrder', precision: 10, nullable: true)]
    private ?int $groupSortOrder = null;

    /**
     * Identifier of the Level Set to which the level belongs
     */
    #[ORM\Column(name: 'LevelSetId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelSetId = null;

    /**
     * Set to true if the Level Set, Criterion Group or Criterion has been deleted
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

    public function getCriterionId(): ?string
    {
        return $this->criterionId;
    }

    public function setCriterionId(string $criterionId): static
    {
        $this->criterionId = $criterionId;

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

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getCriteriaGroupId(): ?string
    {
        return $this->criteriaGroupId;
    }

    public function setCriteriaGroupId(?string $criteriaGroupId): static
    {
        $this->criteriaGroupId = $criteriaGroupId;

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): static
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getGroupSortOrder(): ?int
    {
        return $this->groupSortOrder;
    }

    public function setGroupSortOrder(?int $groupSortOrder): static
    {
        $this->groupSortOrder = $groupSortOrder;

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
