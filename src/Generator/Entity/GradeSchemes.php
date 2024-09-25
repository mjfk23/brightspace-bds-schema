<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradeSchemesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Schemes Brightspace Data Set returns data about created grade schemes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-schemes
 */
#[ORM\Entity(repositoryClass: GradeSchemesRepository::class)]
#[ORM\Table(name: 'D2L_GRADE_SCHEME')]
#[UniqueConstraint(name: 'D2L_GRADE_SCHEME_PUK', columns: ['GradeSchemeId'])]
final class GradeSchemes
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique grade scheme identifier.
     */
    #[ORM\Column(name: 'GradeSchemeId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $gradeSchemeId = null;

    /**
     * Unique org unit identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Grade scheme name
     */
    #[ORM\Column(name: 'SchemeName', length: 256, nullable: true)]
    private ?string $schemeName = null;

    /**
     * Date when the scheme was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

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

    public function getGradeSchemeId(): ?string
    {
        return $this->gradeSchemeId;
    }

    public function setGradeSchemeId(string $gradeSchemeId): static
    {
        $this->gradeSchemeId = $gradeSchemeId;

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

    public function getDeletedDate(): ?\DateTimeImmutable
    {
        return $this->deletedDate;
    }

    public function setDeletedDate(?\DateTimeImmutable $deletedDate): static
    {
        $this->deletedDate = $deletedDate;

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
