<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CreatorPracticesAdoptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Creator+ Practices Adoption Brightspace Data Set, each row represents a Practice created using Creator+.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26161-creator-data-sets#creator+-practices-adoption
 */
#[ORM\Entity(repositoryClass: CreatorPracticesAdoptionRepository::class)]
#[ORM\Table(name: 'D2L_CREATOR_PRACTICES_ADOPTION')]
#[UniqueConstraint(name: 'D2L_CREATOR_PRACTICES_ADOPTION_PUK', columns: ['ActivityInstanceId'])]
final class CreatorPracticesAdoption
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Identifies the unique location of the Practice within a Brightspace course. If a Practice appears multiple times
     * in a course, this value changes but the CourseId and ProviderObjectId remain the same.
     */
    #[ORM\Column(name: 'ActivityInstanceId', precision: 10, nullable: false)]
    private ?int $activityInstanceId = null;

    /**
     * Identifies the user who created the Practice.
     */
    #[ORM\Column(name: 'CreatedById', precision: 10, nullable: true)]
    private ?int $createdById = null;

    /**
     * Identifies the Brightspace organizational unit containing the Practice. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The type of Practice.
     */
    #[ORM\Column(name: 'PracticeType', length: 64, nullable: true)]
    private ?string $practiceType = null;

    /**
     * The title provided by the creator of the Practice.
     */
    #[ORM\Column(name: 'PracticeTitle', length: 510, nullable: true)]
    private ?string $practiceTitle = null;

    /**
     * ID of the Practice on the provider service. If a Practice is copied to multiple courses, the CourseId changes but
     * this value remains the same.
     */
    #[ORM\Column(name: 'ProviderObjectId', precision: 10, nullable: true)]
    private ?int $providerObjectId = null;

    /**
     * The date and time (UTC) the Practice was created. For Practices created before July 2024, this is the date the
     * Practice was transformed into a data-enabled Practice.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', precision: 10, nullable: true)]
    private ?int $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getActivityInstanceId(): ?int
    {
        return $this->activityInstanceId;
    }

    public function setActivityInstanceId(int $activityInstanceId): static
    {
        $this->activityInstanceId = $activityInstanceId;

        return $this;
    }

    public function getCreatedById(): ?int
    {
        return $this->createdById;
    }

    public function setCreatedById(?int $createdById): static
    {
        $this->createdById = $createdById;

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

    public function getPracticeType(): ?string
    {
        return $this->practiceType;
    }

    public function setPracticeType(?string $practiceType): static
    {
        $this->practiceType = $practiceType;

        return $this;
    }

    public function getPracticeTitle(): ?string
    {
        return $this->practiceTitle;
    }

    public function setPracticeTitle(?string $practiceTitle): static
    {
        $this->practiceTitle = $practiceTitle;

        return $this;
    }

    public function getProviderObjectId(): ?int
    {
        return $this->providerObjectId;
    }

    public function setProviderObjectId(?int $providerObjectId): static
    {
        $this->providerObjectId = $providerObjectId;

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
