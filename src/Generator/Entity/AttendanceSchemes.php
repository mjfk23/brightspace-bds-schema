<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AttendanceSchemesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Attendance Schemes Brightspace Data Set describes the schemes that are available for use with attendance
 * registers in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4519-attendance-data-sets#attendance-schemes
 */
#[ORM\Entity(repositoryClass: AttendanceSchemesRepository::class)]
#[ORM\Table(name: 'D2L_ATTENDANCE_SCHEME')]
#[UniqueConstraint(name: 'D2L_ATTENDANCE_SCHEME_PUK', columns: ['SchemeId', 'SchemeSymbolId'])]
final class AttendanceSchemes
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique scheme identifier.
     */
    #[ORM\Column(name: 'SchemeId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $schemeId = null;

    /**
     * Unique org unit identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The given name of the scheme.
     */
    #[ORM\Column(name: 'SchemeName', length: 256, nullable: true)]
    private ?string $schemeName = null;

    /**
     * Unique scheme symbol identifier.
     */
    #[ORM\Column(name: 'SchemeSymbolId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $schemeSymbolId = null;

    /**
     * The name given to the symbol.
     */
    #[ORM\Column(name: 'SymbolName', length: 256, nullable: true)]
    private ?string $symbolName = null;

    /**
     * The value used for the symbol.
     */
    #[ORM\Column(name: 'SymbolValue', length: 100, nullable: true)]
    private ?string $symbolValue = null;

    /**
     * The score as a percentage that contributes towards the attendance score when a symbol is given. Field can be
     * null.
     */
    #[ORM\Column(name: 'Percentage', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $percentage = null;

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

    public function getSchemeId(): ?string
    {
        return $this->schemeId;
    }

    public function setSchemeId(string $schemeId): static
    {
        $this->schemeId = $schemeId;

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

    public function getSchemeName(): ?string
    {
        return $this->schemeName;
    }

    public function setSchemeName(?string $schemeName): static
    {
        $this->schemeName = $schemeName;

        return $this;
    }

    public function getSchemeSymbolId(): ?string
    {
        return $this->schemeSymbolId;
    }

    public function setSchemeSymbolId(string $schemeSymbolId): static
    {
        $this->schemeSymbolId = $schemeSymbolId;

        return $this;
    }

    public function getSymbolName(): ?string
    {
        return $this->symbolName;
    }

    public function setSymbolName(?string $symbolName): static
    {
        $this->symbolName = $symbolName;

        return $this;
    }

    public function getSymbolValue(): ?string
    {
        return $this->symbolValue;
    }

    public function setSymbolValue(?string $symbolValue): static
    {
        $this->symbolValue = $symbolValue;

        return $this;
    }

    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    public function setPercentage(?string $percentage): static
    {
        $this->percentage = $percentage;

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
