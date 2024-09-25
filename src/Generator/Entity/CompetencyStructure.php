<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyStructureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Structure Brightspace Data Set returns information about all competency structures for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-structure
 */
#[ORM\Entity(repositoryClass: CompetencyStructureRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_STRUCTURE')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_STRUCTURE_PUK', columns: ['ObjectId', 'ParentObjectId', 'BaseObjectID', 'EntryTime'])]
final class CompetencyStructure
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique competency or learning objective ID
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $objectId = null;

    /**
     * Parent competency or learning objective ID
     */
    #[ORM\Column(name: 'ParentObjectId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $parentObjectId = null;

    /**
     * Unique basic object ID
     */
    #[ORM\Column(name: 'BaseObjectID', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $baseObjectID = null;

    /**
     * Indicates the depth of the competency structure
     */
    #[ORM\Column(name: 'Depth', precision: 10, nullable: true)]
    private ?int $depth = null;

    /**
     * The order in which a competency object exists with respect to its hierarchy.
     */
    #[ORM\Column(name: 'EntryTime', precision: 10, nullable: false)]
    private ?int $entryTime = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getParentObjectId(): ?string
    {
        return $this->parentObjectId;
    }

    public function setParentObjectId(string $parentObjectId): static
    {
        $this->parentObjectId = $parentObjectId;

        return $this;
    }

    public function getBaseObjectID(): ?string
    {
        return $this->baseObjectID;
    }

    public function setBaseObjectID(string $baseObjectID): static
    {
        $this->baseObjectID = $baseObjectID;

        return $this;
    }

    public function getDepth(): ?int
    {
        return $this->depth;
    }

    public function setDepth(?int $depth): static
    {
        $this->depth = $depth;

        return $this;
    }

    public function getEntryTime(): ?int
    {
        return $this->entryTime;
    }

    public function setEntryTime(int $entryTime): static
    {
        $this->entryTime = $entryTime;

        return $this;
    }
}
