<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesAssessedCheckpointsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Outcomes Assessed Checkpoints Brightspace Data Set provides details about the Overall Achievement Calculation
 * Settings for a checkpoint. The data set only captures data from July 2021 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-assessed-checkpoints
 */
#[ORM\Entity(repositoryClass: OutcomesAssessedCheckpointsRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_ASSESSED_CHECKPOINT')]
#[UniqueConstraint(name: 'D2L_OUTCOME_ASSESSED_CHECKPOINT_PUK', columns: ['CheckpointId', 'DemonstrationId'])]
final class OutcomesAssessedCheckpoints
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID of this checkpoint.
     */
    #[ORM\Column(name: 'CheckpointId', type: Types::GUID, nullable: false)]
    private ?string $checkpointId = null;

    /**
     * ID of demonstration which assesses this outcome against the checkpoint.
     */
    #[ORM\Column(name: 'DemonstrationId', type: Types::GUID, nullable: false)]
    private ?string $demonstrationId = null;

    /**
     * Feedback left by assessor, truncated to 1000 characters.
     */
    #[ORM\Column(name: 'Feedback', length: 2000, nullable: true)]
    private ?string $feedback = null;

    /**
     * Value of the decay rate in Mastery View Settings for checkpoint calculation.
     */
    #[ORM\Column(name: 'ConfigDecayRate', precision: 10, nullable: true)]
    private ?int $configDecayRate = null;

    /**
     * Calculation method selected in Mastery View Settings. Possible values:
     */
    #[ORM\Column(name: 'ConfigAggregationMethod', precision: 10, nullable: true)]
    private ?int $configAggregationMethod = null;

    /**
     * Selected activities for use in calculation in Mastery View Settings. If Most Recently Assessed Activities is
     * selected, the specific number of activities to include is stored in ConfigRecentlyAssessedActivityCount. Possible
     * values:
     */
    #[ORM\Column(name: 'ConfigIncludedActivities', precision: 10, nullable: true)]
    private ?int $configIncludedActivities = null;

    /**
     * Selected attempt for use in calculation in Mastery View Settings. Possible values:
     */
    #[ORM\Column(name: 'ConfigMultipleAttemptStrategy', precision: 10, nullable: true)]
    private ?int $configMultipleAttemptStrategy = null;

    /**
     * The number of recently assessed activities to include in calculation, when Most Recently Assessed Activities is
     * selected.
     */
    #[ORM\Column(name: 'ConfigRecentlyAssessedActivityCount', precision: 10, nullable: true)]
    private ?int $configRecentlyAssessedActivityCount = null;

    /**
     * Selected method for how to handle multiple items of the same count in calculating the overall level of
     * achievement in Mastery View Settings. Possible values:
     */
    #[ORM\Column(name: 'ConfigTieBreaker', precision: 10, nullable: true)]
    private ?int $configTieBreaker = null;

    /**
     * Date when this item was last modified. Contains created date upon creation and deleted date for deleted items.
     * Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * ID of user who last modified, created, or deleted this item. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if this item has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates whether a learner has met the achievement threshold. Field can be null.
     */
    #[ORM\Column(name: 'HasMetAchievementThreshold', nullable: true)]
    private ?bool $hasMetAchievementThreshold = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getCheckpointId(): ?string
    {
        return $this->checkpointId;
    }

    public function setCheckpointId(string $checkpointId): static
    {
        $this->checkpointId = $checkpointId;

        return $this;
    }

    public function getDemonstrationId(): ?string
    {
        return $this->demonstrationId;
    }

    public function setDemonstrationId(string $demonstrationId): static
    {
        $this->demonstrationId = $demonstrationId;

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

    public function getConfigDecayRate(): ?int
    {
        return $this->configDecayRate;
    }

    public function setConfigDecayRate(?int $configDecayRate): static
    {
        $this->configDecayRate = $configDecayRate;

        return $this;
    }

    public function getConfigAggregationMethod(): ?int
    {
        return $this->configAggregationMethod;
    }

    public function setConfigAggregationMethod(?int $configAggregationMethod): static
    {
        $this->configAggregationMethod = $configAggregationMethod;

        return $this;
    }

    public function getConfigIncludedActivities(): ?int
    {
        return $this->configIncludedActivities;
    }

    public function setConfigIncludedActivities(?int $configIncludedActivities): static
    {
        $this->configIncludedActivities = $configIncludedActivities;

        return $this;
    }

    public function getConfigMultipleAttemptStrategy(): ?int
    {
        return $this->configMultipleAttemptStrategy;
    }

    public function setConfigMultipleAttemptStrategy(?int $configMultipleAttemptStrategy): static
    {
        $this->configMultipleAttemptStrategy = $configMultipleAttemptStrategy;

        return $this;
    }

    public function getConfigRecentlyAssessedActivityCount(): ?int
    {
        return $this->configRecentlyAssessedActivityCount;
    }

    public function setConfigRecentlyAssessedActivityCount(?int $configRecentlyAssessedActivityCount): static
    {
        $this->configRecentlyAssessedActivityCount = $configRecentlyAssessedActivityCount;

        return $this;
    }

    public function getConfigTieBreaker(): ?int
    {
        return $this->configTieBreaker;
    }

    public function setConfigTieBreaker(?int $configTieBreaker): static
    {
        $this->configTieBreaker = $configTieBreaker;

        return $this;
    }

    public function getLastModifiedDate(): ?\DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(?\DateTimeImmutable $lastModifiedDate): static
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

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

    public function hasMetAchievementThreshold(): ?bool
    {
        return $this->hasMetAchievementThreshold;
    }

    public function setHasMetAchievementThreshold(?bool $hasMetAchievementThreshold): static
    {
        $this->hasMetAchievementThreshold = $hasMetAchievementThreshold;

        return $this;
    }
}
