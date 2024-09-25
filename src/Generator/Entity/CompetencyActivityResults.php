<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyActivityResultsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Activity Results Brightspace Data Set returns data on activities associated with learning objectives
 * that have been created for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-activity-results
 */
#[ORM\Entity(repositoryClass: CompetencyActivityResultsRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_ACTIVITY_RESULT')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_ACTIVITY_RESULT_PUK', columns: ['ActivityId', 'OrgUnitId', 'UserId', 'LearningObjectId'])]
final class CompetencyActivityResults
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for activity associated with a competency
     */
    #[ORM\Column(name: 'ActivityId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $activityId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique user Identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique learning object identifier
     */
    #[ORM\Column(name: 'LearningObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $learningObjectId = null;

    /**
     * Is learning objective achieved. Field can be null.
     */
    #[ORM\Column(name: 'IsAchieved', nullable: true)]
    private ?bool $isAchieved = null;

    /**
     * Percentage achieved in the activity. Field can be null.
     */
    #[ORM\Column(name: 'PercentAchieved', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $percentAchieved = null;

    /**
     * Rubric score achieved in the activity. Field can be null.
     */
    #[ORM\Column(name: 'RubricScore', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $rubricScore = null;

    /**
     * Rubric level achieved in the activity. Field can be null.
     */
    #[ORM\Column(name: 'RubricLevelAchieved', length: 512, nullable: true)]
    private ?string $rubricLevelAchieved = null;

    /**
     * Rubric id attached to the competency activity (used for evaluation). Field can be null.
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Criterion attached to the competency activity. Field can be null.
     */
    #[ORM\Column(name: 'RubricCriterionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricCriterionId = null;

    /**
     * Date the competency was achieved (UTC). Field can be null.
     */
    #[ORM\Column(name: 'AchievedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $achievedDate = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getActivityId(): ?string
    {
        return $this->activityId;
    }

    public function setActivityId(string $activityId): static
    {
        $this->activityId = $activityId;

        return $this;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getLearningObjectId(): ?string
    {
        return $this->learningObjectId;
    }

    public function setLearningObjectId(string $learningObjectId): static
    {
        $this->learningObjectId = $learningObjectId;

        return $this;
    }

    public function isAchieved(): ?bool
    {
        return $this->isAchieved;
    }

    public function setAchieved(?bool $isAchieved): static
    {
        $this->isAchieved = $isAchieved;

        return $this;
    }

    public function getPercentAchieved(): ?string
    {
        return $this->percentAchieved;
    }

    public function setPercentAchieved(?string $percentAchieved): static
    {
        $this->percentAchieved = $percentAchieved;

        return $this;
    }

    public function getRubricScore(): ?string
    {
        return $this->rubricScore;
    }

    public function setRubricScore(?string $rubricScore): static
    {
        $this->rubricScore = $rubricScore;

        return $this;
    }

    public function getRubricLevelAchieved(): ?string
    {
        return $this->rubricLevelAchieved;
    }

    public function setRubricLevelAchieved(?string $rubricLevelAchieved): static
    {
        $this->rubricLevelAchieved = $rubricLevelAchieved;

        return $this;
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

    public function getRubricCriterionId(): ?string
    {
        return $this->rubricCriterionId;
    }

    public function setRubricCriterionId(?string $rubricCriterionId): static
    {
        $this->rubricCriterionId = $rubricCriterionId;

        return $this;
    }

    public function getAchievedDate(): ?\DateTimeImmutable
    {
        return $this->achievedDate;
    }

    public function setAchievedDate(?\DateTimeImmutable $achievedDate): static
    {
        $this->achievedDate = $achievedDate;

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
