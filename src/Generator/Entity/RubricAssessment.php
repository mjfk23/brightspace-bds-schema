<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricAssessmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Assessment Brightspace Data Set returns rubric outcomes that are associated with a competency. Includes
 * incomplete rubric assessments, which have a null LevelAchieved value.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-assessment
 */
#[ORM\Entity(repositoryClass: RubricAssessmentRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_ASSESSMENT')]
#[UniqueConstraint(name: 'D2L_RUBRIC_ASSESSMENT_PUK', columns: ['UserId', 'AssessmentId'])]
final class RubricAssessment
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
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Rubric score. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 36, scale: 2, nullable: true)]
    private ?string $score = null;

    /**
     * Rubric assessed by. Field can be null.
     */
    #[ORM\Column(name: 'AssessedByUserId', precision: 10, nullable: true)]
    private ?int $assessedByUserId = null;

    /**
     * Date the rubric was assessed (UTC).
     */
    #[ORM\Column(name: 'AssessmentDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $assessmentDate = null;

    /**
     * Is rubric assessment complete.
     */
    #[ORM\Column(name: 'IsCompleted', nullable: true)]
    private ?bool $isCompleted = null;

    /**
     * Activity type associated with the rubric. Field can be null.
     */
    #[ORM\Column(name: 'ActivityType', length: 100, nullable: true)]
    private ?string $activityType = null;

    /**
     * Identifier of the activity associated with the rubric. Field can be null.
     */
    #[ORM\Column(name: 'ActivityObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $activityObjectId = null;

    /**
     * Date rubric was created (UTC).
     */
    #[ORM\Column(name: 'DateCreated', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateCreated = null;

    /**
     * Unique assessment ID.
     */
    #[ORM\Column(name: 'AssessmentId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $assessmentId = null;

    /**
     * Unique rubric level achieved identifier. Field can be null.
     */
    #[ORM\Column(name: 'LevelAchievedId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelAchievedId = null;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
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

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getAssessedByUserId(): ?int
    {
        return $this->assessedByUserId;
    }

    public function setAssessedByUserId(?int $assessedByUserId): static
    {
        $this->assessedByUserId = $assessedByUserId;

        return $this;
    }

    public function getAssessmentDate(): ?\DateTimeImmutable
    {
        return $this->assessmentDate;
    }

    public function setAssessmentDate(?\DateTimeImmutable $assessmentDate): static
    {
        $this->assessmentDate = $assessmentDate;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setCompleted(?bool $isCompleted): static
    {
        $this->isCompleted = $isCompleted;

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

    public function getActivityObjectId(): ?string
    {
        return $this->activityObjectId;
    }

    public function setActivityObjectId(?string $activityObjectId): static
    {
        $this->activityObjectId = $activityObjectId;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeImmutable
    {
        return $this->dateCreated;
    }

    public function setDateCreated(?\DateTimeImmutable $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getAssessmentId(): ?string
    {
        return $this->assessmentId;
    }

    public function setAssessmentId(string $assessmentId): static
    {
        $this->assessmentId = $assessmentId;

        return $this;
    }

    public function getLevelAchievedId(): ?string
    {
        return $this->levelAchievedId;
    }

    public function setLevelAchievedId(?string $levelAchievedId): static
    {
        $this->levelAchievedId = $levelAchievedId;

        return $this;
    }
}
