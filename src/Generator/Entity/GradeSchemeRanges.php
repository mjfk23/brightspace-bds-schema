<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradeSchemeRangesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Schemes Ranges Brightspace Data Set describes the ranges used in grade schemes in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-scheme-ranges
 */
#[ORM\Entity(repositoryClass: GradeSchemeRangesRepository::class)]
#[ORM\Table(name: 'D2L_GRADE_SCHEME_RANGE')]
#[UniqueConstraint(name: 'D2L_GRADE_SCHEME_RANGE_PUK', columns: ['GradeSchemeRangeId', 'GradeSchemeId'])]
final class GradeSchemeRanges
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique grade scheme range identifier.
     */
    #[ORM\Column(name: 'GradeSchemeRangeId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $gradeSchemeRangeId = null;

    /**
     * Unique grade scheme identifier.
     */
    #[ORM\Column(name: 'GradeSchemeId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $gradeSchemeId = null;

    /**
     * The name of the range.
     */
    #[ORM\Column(name: 'SymbolString', length: 200, nullable: true)]
    private ?string $symbolString = null;

    /**
     * The value assigned to the grade scheme range. Field can be null.
     */
    #[ORM\Column(name: 'AssignedValue', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $assignedValue = null;

    /**
     * The starting value (in percent) of the grade scheme.
     */
    #[ORM\Column(name: 'RangeStart', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $rangeStart = null;

    /**
     * Indicates that the grade scheme is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

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

    public function getGradeSchemeRangeId(): ?string
    {
        return $this->gradeSchemeRangeId;
    }

    public function setGradeSchemeRangeId(string $gradeSchemeRangeId): static
    {
        $this->gradeSchemeRangeId = $gradeSchemeRangeId;

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

    public function getSymbolString(): ?string
    {
        return $this->symbolString;
    }

    public function setSymbolString(?string $symbolString): static
    {
        $this->symbolString = $symbolString;

        return $this;
    }

    public function getAssignedValue(): ?string
    {
        return $this->assignedValue;
    }

    public function setAssignedValue(?string $assignedValue): static
    {
        $this->assignedValue = $assignedValue;

        return $this;
    }

    public function getRangeStart(): ?string
    {
        return $this->rangeStart;
    }

    public function setRangeStart(?string $rangeStart): static
    {
        $this->rangeStart = $rangeStart;

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
