<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OrganizationalUnitParentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Organizational Unit Parents Brightspace Data Set returns the direct parent of each org unit in order to build out
 * the initial org unit structure.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4529-organizational-units-data-sets#organizational-unit-parents
 */
#[ORM\Entity(repositoryClass: OrganizationalUnitParentsRepository::class)]
#[ORM\Table(name: 'D2L_ORGANIZATIONAL_UNIT_PARENT')]
#[UniqueConstraint(name: 'D2L_ORGANIZATIONAL_UNIT_PARENT_PUK', columns: ['OrgUnitId', 'ParentOrgUnitId'])]
final class OrganizationalUnitParents
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
     * Parent org unit identifier
     */
    #[ORM\Column(name: 'ParentOrgUnitId', precision: 10, nullable: false)]
    private ?int $parentOrgUnitId = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'RowVersion', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rowVersion = null;

    /**
     * Date the parent-child relationship was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

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

    public function getParentOrgUnitId(): ?int
    {
        return $this->parentOrgUnitId;
    }

    public function setParentOrgUnitId(int $parentOrgUnitId): static
    {
        $this->parentOrgUnitId = $parentOrgUnitId;

        return $this;
    }

    public function getRowVersion(): ?string
    {
        return $this->rowVersion;
    }

    public function setRowVersion(?string $rowVersion): static
    {
        $this->rowVersion = $rowVersion;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }
}
