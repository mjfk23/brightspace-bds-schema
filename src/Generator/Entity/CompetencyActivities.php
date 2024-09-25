<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyActivitiesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Activities Brightspace Data Set retrieves the data required to associate rubrics with competency
 * activities. Using the returned data, clients can validate that they have configured the associations correctly.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-activities
 */
#[ORM\Entity(repositoryClass: CompetencyActivitiesRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_ACTIVITY')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_ACTIVITY_PUK', columns: ['ActivityId'])]
final class CompetencyActivities
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the activity associated with the competency. Can join with Competency Activity Results,
     * Activity Exemptions Log, SCORM Objectives, SCORM Activity Attempts, SCORM Interactions, and SCORM Interaction
     * Attempts.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $activityId = null;

    /**
     * Identifier for the Org Unit associated with the competency.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The name of the activity.
     */
    #[ORM\Column(name: 'ActivityName', length: 512, nullable: true)]
    private ?string $activityName = null;

    /**
     * Identifier for the activity type
     */
    #[ORM\Column(name: 'ActivityTypeId', precision: 10, nullable: true)]
    private ?int $activityTypeId = null;

    /**
     * Rubric assessment type
     */
    #[ORM\Column(name: 'AssessmentType', length: 14, nullable: true)]
    private ?string $assessmentType = null;

    /**
     * Lookup object id that is associated with the object.
     */
    #[ORM\Column(name: 'ObjectLookupId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectLookupId = null;

    /**
     * Identifier of the rubric. This field is only valid for competency activities associated with a rubric. Field can
     * be null.
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Identifier of the rubric level associated with the competency activity. This field is only valid for competency
     * activities associated with a rubric. Field can be null.
     */
    #[ORM\Column(name: 'LevelId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelId = null;

    /**
     * Identifier of the rubric criterion associated with the activity. This field is only valid for competency
     * activities associated with a rubric and scored at the criteria level. If the overall rubric score is used, the
     * value is null.
     */
    #[ORM\Column(name: 'RubricCriterionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricCriterionId = null;

    /**
     * For numeric activity only. Can be >= (greater than or equal to), > (greater than), = (equal to), <= (less than or
     * equal to), or < (less than). Field can be null.
     */
    #[ORM\Column(name: 'AssessmentThresholdCriteria', length: 4, nullable: true)]
    private ?string $assessmentThresholdCriteria = null;

    /**
     * When a competency activity is evaluated, the assessment threshold is the value that must be met by a learner to
     * achieve the competency. Field can be null.
     */
    #[ORM\Column(name: 'AssessmentThreshold', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $assessmentThreshold = null;

    /**
     * Indicates if this competency is automatically evaluated. If this is false, the competency is a manual evaluation.
     */
    #[ORM\Column(name: 'IsAutoEval', nullable: true)]
    private ?bool $isAutoEval = null;

    /**
     * Name of the rubric. Field can be null.
     */
    #[ORM\Column(name: 'RubricName', length: 512, nullable: true)]
    private ?string $rubricName = null;

    /**
     * Level required to achieve this learning objective. Field can be null.
     */
    #[ORM\Column(name: 'RubricLevelRequired', length: 512, nullable: true)]
    private ?string $rubricLevelRequired = null;

    /**
     * Identifier of the competency object associated with the competency activity. Field can be null.
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectId = null;

    /**
     * Type of activity. Field can be null.
     */
    #[ORM\Column(name: 'ActivityType', length: 100, nullable: true)]
    private ?string $activityType = null;

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

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getActivityName(): ?string
    {
        return $this->activityName;
    }

    public function setActivityName(?string $activityName): static
    {
        $this->activityName = $activityName;

        return $this;
    }

    public function getActivityTypeId(): ?int
    {
        return $this->activityTypeId;
    }

    public function setActivityTypeId(?int $activityTypeId): static
    {
        $this->activityTypeId = $activityTypeId;

        return $this;
    }

    public function getAssessmentType(): ?string
    {
        return $this->assessmentType;
    }

    public function setAssessmentType(?string $assessmentType): static
    {
        $this->assessmentType = $assessmentType;

        return $this;
    }

    public function getObjectLookupId(): ?string
    {
        return $this->objectLookupId;
    }

    public function setObjectLookupId(?string $objectLookupId): static
    {
        $this->objectLookupId = $objectLookupId;

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

    public function getLevelId(): ?string
    {
        return $this->levelId;
    }

    public function setLevelId(?string $levelId): static
    {
        $this->levelId = $levelId;

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

    public function getAssessmentThresholdCriteria(): ?string
    {
        return $this->assessmentThresholdCriteria;
    }

    public function setAssessmentThresholdCriteria(?string $assessmentThresholdCriteria): static
    {
        $this->assessmentThresholdCriteria = $assessmentThresholdCriteria;

        return $this;
    }

    public function getAssessmentThreshold(): ?string
    {
        return $this->assessmentThreshold;
    }

    public function setAssessmentThreshold(?string $assessmentThreshold): static
    {
        $this->assessmentThreshold = $assessmentThreshold;

        return $this;
    }

    public function isAutoEval(): ?bool
    {
        return $this->isAutoEval;
    }

    public function setAutoEval(?bool $isAutoEval): static
    {
        $this->isAutoEval = $isAutoEval;

        return $this;
    }

    public function getRubricName(): ?string
    {
        return $this->rubricName;
    }

    public function setRubricName(?string $rubricName): static
    {
        $this->rubricName = $rubricName;

        return $this;
    }

    public function getRubricLevelRequired(): ?string
    {
        return $this->rubricLevelRequired;
    }

    public function setRubricLevelRequired(?string $rubricLevelRequired): static
    {
        $this->rubricLevelRequired = $rubricLevelRequired;

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

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function setActivityType(?string $activityType): static
    {
        $this->activityType = $activityType;

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
