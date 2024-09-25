<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OrganizationalUnitAncestorsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Organizational Unit Ancestors Brightspace Data Set returns a list of all the org units and the corresponding
 * ancestors for an org unit. An ancestor is defined as a parent of an org unit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4529-organizational-units-data-sets#organizational-unit-ancestors
 */
#[ORM\Entity(repositoryClass: OrganizationalUnitAncestorsRepository::class)]
#[ORM\Table(name: 'D2L_ORGANIZATIONAL_UNIT_ANCESTOR')]
#[UniqueConstraint(name: 'D2L_ORGANIZATIONAL_UNIT_ANCESTOR_PUK', columns: ['OrgUnitId', 'AncestorOrgUnitId'])]
final class OrganizationalUnitAncestors
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
    #[ORM\Column(name: 'AncestorOrgUnitId', precision: 10, nullable: false)]
    private ?int $ancestorOrgUnitId = null;

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

    public function getAncestorOrgUnitId(): ?int
    {
        return $this->ancestorOrgUnitId;
    }

    public function setAncestorOrgUnitId(int $ancestorOrgUnitId): static
    {
        $this->ancestorOrgUnitId = $ancestorOrgUnitId;

        return $this;
    }
}
