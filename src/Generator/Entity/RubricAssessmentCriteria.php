<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricAssessmentCriteriaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Assessment Criteria Brightspace Data Set returns details for all rubric criteria in rubrics.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-assessment-criteria
 */
#[ORM\Entity(repositoryClass: RubricAssessmentCriteriaRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_ASSESSMENT_CRITERIA')]
#[UniqueConstraint(name: 'D2L_RUBRIC_ASSESSMENT_CRITERIA_PUK', columns: ['AssessmentId', 'UserId', 'CriterionId'])]
final class RubricAssessmentCriteria
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique assessment ID
     */
    #[ORM\Column(name: 'AssessmentId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $assessmentId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique rubric ID
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Rubric score the user achieved on a criterion. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Feedback for that criterion. Field can be null.
     */
    #[ORM\Column(name: 'Feedback', length: 2000, nullable: true)]
    private ?string $feedback = null;

    /**
     * Is score overridden by instructor
     */
    #[ORM\Column(name: 'IsScoreOverridden', nullable: true)]
    private ?bool $isScoreOverridden = null;

    /**
     * Unique criterion identifier
     */
    #[ORM\Column(name: 'CriterionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $criterionId = null;

    /**
     * Unique rubric level achieved identifier. Field can be null.
     */
    #[ORM\Column(name: 'LevelAchievedId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelAchievedId = null;

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

    public function getAssessmentId(): ?string
    {
        return $this->assessmentId;
    }

    public function setAssessmentId(string $assessmentId): static
    {
        $this->assessmentId = $assessmentId;

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

    public function getRubricId(): ?string
    {
        return $this->rubricId;
    }

    public function setRubricId(?string $rubricId): static
    {
        $this->rubricId = $rubricId;

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

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): static
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function isScoreOverridden(): ?bool
    {
        return $this->isScoreOverridden;
    }

    public function setScoreOverridden(?bool $isScoreOverridden): static
    {
        $this->isScoreOverridden = $isScoreOverridden;

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

    public function getLevelAchievedId(): ?string
    {
        return $this->levelAchievedId;
    }

    public function setLevelAchievedId(?string $levelAchievedId): static
    {
        $this->levelAchievedId = $levelAchievedId;

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
