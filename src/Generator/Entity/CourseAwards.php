<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CourseAwardsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Awards Brightspace Data Set returns a list of all the awards that exist in each course for all your org
 * units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4520-awards-data-sets#course-awards
 */
#[ORM\Entity(repositoryClass: CourseAwardsRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_AWARD')]
#[UniqueConstraint(name: 'D2L_COURSE_AWARD_PUK', columns: ['AssociationId'])]
final class CourseAwards
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique association identifier
     */
    #[ORM\Column(name: 'AssociationId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $associationId = null;

    /**
     * Unique award identifier
     */
    #[ORM\Column(name: 'AwardId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $awardId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * Date when the award was created (UTC).
     */
    #[ORM\Column(name: 'DateCreated', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateCreated = null;

    /**
     * Award is hidden from learner view
     */
    #[ORM\Column(name: 'HiddenAward', nullable: true)]
    private ?bool $hiddenAward = null;

    /**
     * Identifier for the conditions that need to be met in order to issue this award. Field can be null.
     */
    #[ORM\Column(name: 'ConditionSetId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $conditionSetId = null;

    /**
     * Date when the award was last changed (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Indicates if the award has credits, and how many. Field can be null.
     */
    #[ORM\Column(name: 'Credits', type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $credits = null;

    /**
     * Indicates whether the award is associated to the course.
     */
    #[ORM\Column(name: 'IsAssociated', nullable: true)]
    private ?bool $isAssociated = null;

    /**
     * Version number for the course award.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAssociationId(): ?string
    {
        return $this->associationId;
    }

    public function setAssociationId(string $associationId): static
    {
        $this->associationId = $associationId;

        return $this;
    }

    public function getAwardId(): ?string
    {
        return $this->awardId;
    }

    public function setAwardId(?string $awardId): static
    {
        $this->awardId = $awardId;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?string $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function isHiddenAward(): ?bool
    {
        return $this->hiddenAward;
    }

    public function setHiddenAward(?bool $hiddenAward): static
    {
        $this->hiddenAward = $hiddenAward;

        return $this;
    }

    public function getConditionSetId(): ?string
    {
        return $this->conditionSetId;
    }

    public function setConditionSetId(?string $conditionSetId): static
    {
        $this->conditionSetId = $conditionSetId;

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

    public function getCredits(): ?string
    {
        return $this->credits;
    }

    public function setCredits(?string $credits): static
    {
        $this->credits = $credits;

        return $this;
    }

    public function isAssociated(): ?bool
    {
        return $this->isAssociated;
    }

    public function setAssociated(?bool $isAssociated): static
    {
        $this->isAssociated = $isAssociated;

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
