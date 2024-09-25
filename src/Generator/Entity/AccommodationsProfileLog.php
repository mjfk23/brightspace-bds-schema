<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AccommodationsProfileLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Accommodations Profile Log Brightspace Data Set returns all accommodations that have been created for learners in
 * an org unit. Note: Learner accommodations contain sensitive information.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4752-accommodations-data-sets#accommodations-profile-log
 */
#[ORM\Entity(repositoryClass: AccommodationsProfileLogRepository::class)]
#[ORM\Table(name: 'D2L_ACCOMMODATIONS_PROFILE_LOG')]
#[UniqueConstraint(name: 'D2L_ACCOMMODATIONS_PROFILE_LOG_PUK', columns: ['AccommodatedUserId', 'OrgUnitId', 'LastModified'])]
final class AccommodationsProfileLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'AccommodatedUserId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $accommodatedUserId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $orgUnitId = null;

    /**
     * Amount of Time Multiplier for a quiz. Field can be null.
     */
    #[ORM\Column(name: 'QuizTimeLimitMultiplier', type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $quizTimeLimitMultiplier = null;

    /**
     * Amount of extra time allowed. Field can be null.
     */
    #[ORM\Column(name: 'QuizTimeLimitExtraTime', precision: 10, nullable: true)]
    private ?int $quizTimeLimitExtraTime = null;

    /**
     * Indicates if the accommodation includes Always Include RightClick. Field can be null.
     */
    #[ORM\Column(name: 'QuizControlAlwaysAllowRightClick', nullable: true)]
    private ?bool $quizControlAlwaysAllowRightClick = null;

    /**
     * Unique identifier of the user who last modified the accommodation.
     */
    #[ORM\Column(name: 'ModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $modifiedBy = null;

    /**
     * Date the accommodation was updated (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAccommodatedUserId(): ?string
    {
        return $this->accommodatedUserId;
    }

    public function setAccommodatedUserId(string $accommodatedUserId): static
    {
        $this->accommodatedUserId = $accommodatedUserId;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(string $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getQuizTimeLimitMultiplier(): ?string
    {
        return $this->quizTimeLimitMultiplier;
    }

    public function setQuizTimeLimitMultiplier(?string $quizTimeLimitMultiplier): static
    {
        $this->quizTimeLimitMultiplier = $quizTimeLimitMultiplier;

        return $this;
    }

    public function getQuizTimeLimitExtraTime(): ?int
    {
        return $this->quizTimeLimitExtraTime;
    }

    public function setQuizTimeLimitExtraTime(?int $quizTimeLimitExtraTime): static
    {
        $this->quizTimeLimitExtraTime = $quizTimeLimitExtraTime;

        return $this;
    }

    public function isQuizControlAlwaysAllowRightClick(): ?bool
    {
        return $this->quizControlAlwaysAllowRightClick;
    }

    public function setQuizControlAlwaysAllowRightClick(?bool $quizControlAlwaysAllowRightClick): static
    {
        $this->quizControlAlwaysAllowRightClick = $quizControlAlwaysAllowRightClick;

        return $this;
    }

    public function getModifiedBy(): ?string
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }
}
