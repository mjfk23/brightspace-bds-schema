<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesCourseSpecificScalesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Outcomes Course Specific Scales Brightspace Data Set provides details on which achievement scales and achievement
 * thresholds are being used in each of your courses. The only available data for course specific achievement scales is
 * from May 2023 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-course-specific-scales
 */
#[ORM\Entity(repositoryClass: OutcomesCourseSpecificScalesRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_COURSE_SPECIFIC_SCALE')]
#[UniqueConstraint(name: 'D2L_OUTCOME_COURSE_SPECIFIC_SCALE_PUK', columns: ['OrgUnitId'])]
final class OutcomesCourseSpecificScales
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID of the org unit this registry is associated with.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * ID of the current registry.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: true)]
    private ?string $registryId = null;

    /**
     * ID of the scale set as the LOA for the current registry.
     */
    #[ORM\Column(name: 'ScaleId', type: Types::GUID, nullable: true)]
    private ?string $scaleId = null;

    /**
     * Level ID representing the threshold of achievement for this registry. Field can be null.
     */
    #[ORM\Column(name: 'AchievementThreshold', type: Types::GUID, nullable: true)]
    private ?string $achievementThreshold = null;

    /**
     * Date when this item was originally created (UTC).
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * Date when this item was last modified. Contains created date upon creation and deleted date for deleted items
     * (UTC).
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * ID of user who last modified, created, or deleted this item. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Whether this item has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getRegistryId(): ?string
    {
        return $this->registryId;
    }

    public function setRegistryId(?string $registryId): static
    {
        $this->registryId = $registryId;

        return $this;
    }

    public function getScaleId(): ?string
    {
        return $this->scaleId;
    }

    public function setScaleId(?string $scaleId): static
    {
        $this->scaleId = $scaleId;

        return $this;
    }

    public function getAchievementThreshold(): ?string
    {
        return $this->achievementThreshold;
    }

    public function setAchievementThreshold(?string $achievementThreshold): static
    {
        $this->achievementThreshold = $achievementThreshold;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeImmutable
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeImmutable $createdDate): static
    {
        $this->createdDate = $createdDate;

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
}
