<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradebookSettingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Book Settings Brightspace Data Set returns all the grade book settings for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-book-settings
 */
#[ORM\Entity(repositoryClass: GradebookSettingsRepository::class)]
#[ORM\Table(name: 'D2L_GRADEBOOK_SETTINGS')]
#[UniqueConstraint(name: 'D2L_GRADEBOOK_SETTINGS_PUK', columns: ['OrgUnitId', 'GradeSchemeId'])]
final class GradebookSettings
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique grade scheme identifier
     */
    #[ORM\Column(name: 'GradeSchemeId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $gradeSchemeId = null;

    /**
     * Type of grading system setup for the course
     */
    #[ORM\Column(name: 'GradingSystem', length: 16, nullable: true)]
    private ?string $gradingSystem = null;

    /**
     * Drop ungraded items/Treat them as 0
     */
    #[ORM\Column(name: 'UngradedItems', length: 50, nullable: true)]
    private ?string $ungradedItems = null;

    /**
     * Is final adjusted grade released to user. Field can be null.
     */
    #[ORM\Column(name: 'IsAdjustedFinalGradeReleased', nullable: true)]
    private ?bool $isAdjustedFinalGradeReleased = null;

    /**
     * Is calculated adjusted grade released to user. Field can be null.
     */
    #[ORM\Column(name: 'IsCalculatedFinalGradeReleased', nullable: true)]
    private ?bool $isCalculatedFinalGradeReleased = null;

    /**
     * Date gradebook settings were last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

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

    public function getGradeSchemeId(): ?string
    {
        return $this->gradeSchemeId;
    }

    public function setGradeSchemeId(string $gradeSchemeId): static
    {
        $this->gradeSchemeId = $gradeSchemeId;

        return $this;
    }

    public function getGradingSystem(): ?string
    {
        return $this->gradingSystem;
    }

    public function setGradingSystem(?string $gradingSystem): static
    {
        $this->gradingSystem = $gradingSystem;

        return $this;
    }

    public function getUngradedItems(): ?string
    {
        return $this->ungradedItems;
    }

    public function setUngradedItems(?string $ungradedItems): static
    {
        $this->ungradedItems = $ungradedItems;

        return $this;
    }

    public function isAdjustedFinalGradeReleased(): ?bool
    {
        return $this->isAdjustedFinalGradeReleased;
    }

    public function setAdjustedFinalGradeReleased(?bool $isAdjustedFinalGradeReleased): static
    {
        $this->isAdjustedFinalGradeReleased = $isAdjustedFinalGradeReleased;

        return $this;
    }

    public function isCalculatedFinalGradeReleased(): ?bool
    {
        return $this->isCalculatedFinalGradeReleased;
    }

    public function setCalculatedFinalGradeReleased(?bool $isCalculatedFinalGradeReleased): static
    {
        $this->isCalculatedFinalGradeReleased = $isCalculatedFinalGradeReleased;

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
