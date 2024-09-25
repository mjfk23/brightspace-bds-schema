<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMActivitiesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Activities Brightspace Data Set describes the activities that exist in the SCORM package. Each activity
 * will only be known after the first user, regardless of role, attempts it.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-activities
 */
#[ORM\Entity(repositoryClass: SCORMActivitiesRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_ACTIVITY')]
#[UniqueConstraint(name: 'D2L_SCORM_ACTIVITY_PUK', columns: ['ActivityId'])]
final class SCORMActivities
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the SCORM activity.
     */
    #[ORM\Column(name: 'ActivityId', type: Types::GUID, nullable: false)]
    private ?string $activityId = null;

    /**
     * Unique identifier for each content object.
     */
    #[ORM\Column(name: 'ScormObjectId', type: Types::GUID, nullable: true)]
    private ?string $scormObjectId = null;

    /**
     * Unique identifier of the parent activity. Field can be null.
     */
    #[ORM\Column(name: 'ParentActivityId', type: Types::GUID, nullable: true)]
    private ?string $parentActivityId = null;

    /**
     * Number of child activities of this activity.
     */
    #[ORM\Column(name: 'NumChildren', precision: 10, nullable: true)]
    private ?int $numChildren = null;

    /**
     * Unique label for the activity. Field can be null.
     */
    #[ORM\Column(name: 'InternalId', length: 510, nullable: true)]
    private ?string $internalId = null;

    /**
     * The title of the activity. Field can be null.
     */
    #[ORM\Column(name: 'Title', length: 400, nullable: true)]
    private ?string $title = null;

    /**
     * Used to determine when the activity is considered complete. Field can be null.
     */
    #[ORM\Column(name: 'CompletionThreshold', nullable: true)]
    private ?float $completionThreshold = null;

    /**
     * Scaled score required to pass the activity, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'PassingScore', nullable: true)]
    private ?float $passingScore = null;

    /**
     * Whether the passing score was used to determine the learner success status. Field can be null.
     */
    #[ORM\Column(name: 'PassingScoreUsed', nullable: true)]
    private ?bool $passingScoreUsed = null;

    /**
     * Minimum value in the range for the raw score in an activity attempt. Field can be null.
     */
    #[ORM\Column(name: 'ScoreMin', nullable: true)]
    private ?float $scoreMin = null;

    /**
     * Maximum value in the range for the raw score in an activity attempt. Field can be null.
     */
    #[ORM\Column(name: 'ScoreMax', nullable: true)]
    private ?float $scoreMax = null;

    /**
     * Date when the activity was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

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

    public function getScormObjectId(): ?string
    {
        return $this->scormObjectId;
    }

    public function setScormObjectId(?string $scormObjectId): static
    {
        $this->scormObjectId = $scormObjectId;

        return $this;
    }

    public function getParentActivityId(): ?string
    {
        return $this->parentActivityId;
    }

    public function setParentActivityId(?string $parentActivityId): static
    {
        $this->parentActivityId = $parentActivityId;

        return $this;
    }

    public function getNumChildren(): ?int
    {
        return $this->numChildren;
    }

    public function setNumChildren(?int $numChildren): static
    {
        $this->numChildren = $numChildren;

        return $this;
    }

    public function getInternalId(): ?string
    {
        return $this->internalId;
    }

    public function setInternalId(?string $internalId): static
    {
        $this->internalId = $internalId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCompletionThreshold(): ?float
    {
        return $this->completionThreshold;
    }

    public function setCompletionThreshold(?float $completionThreshold): static
    {
        $this->completionThreshold = $completionThreshold;

        return $this;
    }

    public function getPassingScore(): ?float
    {
        return $this->passingScore;
    }

    public function setPassingScore(?float $passingScore): static
    {
        $this->passingScore = $passingScore;

        return $this;
    }

    public function isPassingScoreUsed(): ?bool
    {
        return $this->passingScoreUsed;
    }

    public function setPassingScoreUsed(?bool $passingScoreUsed): static
    {
        $this->passingScoreUsed = $passingScoreUsed;

        return $this;
    }

    public function getScoreMin(): ?float
    {
        return $this->scoreMin;
    }

    public function setScoreMin(?float $scoreMin): static
    {
        $this->scoreMin = $scoreMin;

        return $this;
    }

    public function getScoreMax(): ?float
    {
        return $this->scoreMax;
    }

    public function setScoreMax(?float $scoreMax): static
    {
        $this->scoreMax = $scoreMax;

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
}
