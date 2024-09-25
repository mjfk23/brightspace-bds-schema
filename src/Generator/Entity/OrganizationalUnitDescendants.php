<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OrganizationalUnitDescendantsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Organizational Unit Descendants Brightspace Data Set returns a list of all the org units and the corresponding
 * descendants for an org unit. A descendant is defined as the child of an org unit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4529-organizational-units-data-sets#organizational-unit-descendants
 */
#[ORM\Entity(repositoryClass: OrganizationalUnitDescendantsRepository::class)]
#[ORM\Table(name: 'D2L_ORGANIZATIONAL_UNIT_DESCENDANT')]
#[UniqueConstraint(name: 'D2L_ORGANIZATIONAL_UNIT_DESCENDANT_PUK', columns: ['OrgUnitId', 'DescendantOrgUnitId'])]
final class OrganizationalUnitDescendants
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
     * Child org unit identifier
     */
    #[ORM\Column(name: 'DescendantOrgUnitId', precision: 10, nullable: false)]
    private ?int $descendantOrgUnitId = null;

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

    public function getDescendantOrgUnitId(): ?int
    {
        return $this->descendantOrgUnitId;
    }

    public function setDescendantOrgUnitId(int $descendantOrgUnitId): static
    {
        $this->descendantOrgUnitId = $descendantOrgUnitId;

        return $this;
    }
}
