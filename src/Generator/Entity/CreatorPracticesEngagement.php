<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CreatorPracticesEngagementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Practices Engagement Brightspace Data Set, each row represents an instance where a learner attempted a
 * Practice and checked their answer.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26161-creator-data-sets#creator+-practices-engagement
 */
#[ORM\Entity(repositoryClass: CreatorPracticesEngagementRepository::class)]
#[ORM\Table(name: 'D2L_CREATOR_PRACTICES_ENGAGEMENT')]
#[UniqueConstraint(name: 'D2L_CREATOR_PRACTICES_ENGAGEMENT_PUK', columns: ['PracticeEngagementId'])]
final class CreatorPracticesEngagement
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Identifies each attempt available for a learner to complete a Practice.
     */
    #[ORM\Column(name: 'PracticeEngagementId', precision: 10, nullable: false)]
    private ?int $practiceEngagementId = null;

    /**
     * Identifies the user engaging with the Practice attempt.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Identifies the Brightspace course containing the Practice. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The status of the engagement: NotStarted or Completed.
     */
    #[ORM\Column(name: 'CompletionStatus', length: 20, nullable: true)]
    private ?string $completionStatus = null;

    /**
     * Identifies the Practice being attempted.
     */
    #[ORM\Column(name: 'ActivityInstanceId', precision: 10, nullable: true)]
    private ?int $activityInstanceId = null;

    /**
     * The date and time (UTC) the attempt was completed.
     */
    #[ORM\Column(name: 'CompletionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $completionDate = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', precision: 10, nullable: true)]
    private ?int $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getPracticeEngagementId(): ?int
    {
        return $this->practiceEngagementId;
    }

    public function setPracticeEngagementId(int $practiceEngagementId): static
    {
        $this->practiceEngagementId = $practiceEngagementId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

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

    public function getCompletionStatus(): ?string
    {
        return $this->completionStatus;
    }

    public function setCompletionStatus(?string $completionStatus): static
    {
        $this->completionStatus = $completionStatus;

        return $this;
    }

    public function getActivityInstanceId(): ?int
    {
        return $this->activityInstanceId;
    }

    public function setActivityInstanceId(?int $activityInstanceId): static
    {
        $this->activityInstanceId = $activityInstanceId;

        return $this;
    }

    public function getCompletionDate(): ?\DateTimeImmutable
    {
        return $this->completionDate;
    }

    public function setCompletionDate(?\DateTimeImmutable $completionDate): static
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): static
    {
        $this->version = $version;

        return $this;
    }
}
