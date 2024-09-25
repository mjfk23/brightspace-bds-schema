<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesRegistryOwnersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Outcomes Registry Owners Brightspace Data Set, each entry represents a registry for both program and org unit
 * owned registries. The data set only captures data from June 2021 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-registry-owners
 */
#[ORM\Entity(repositoryClass: OutcomesRegistryOwnersRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_REGISTRY_OWNER')]
#[UniqueConstraint(name: 'D2L_OUTCOME_REGISTRY_OWNER_PUK', columns: ['OwnerType', 'OwnerId', 'RegistryId'])]
final class OutcomesRegistryOwners
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Type of entity which owns this registry. Set to 1 if owner is org unit, set to 2 if owner is program.
     */
    #[ORM\Column(name: 'OwnerType', precision: 10, nullable: false)]
    private ?int $ownerType = null;

    /**
     * ID or org unit owner when OwnerType is 1. ID of program when OwnerType is 2.
     */
    #[ORM\Column(name: 'OwnerId', length: 510, nullable: false)]
    private ?string $ownerId = null;

    /**
     * ID of registry for the org unit or program.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: false)]
    private ?string $registryId = null;

    /**
     * Date when this item was initially created (UTC). Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * ID of user who initially created this item. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * Date when this item was last modified (UTC). Contains created date upon creation and deleted date for deleted
     * items.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * ID of user who last modified, created, or deleted this item.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if this item has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOwnerType(): ?int
    {
        return $this->ownerType;
    }

    public function setOwnerType(int $ownerType): static
    {
        $this->ownerType = $ownerType;

        return $this;
    }

    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    public function setOwnerId(string $ownerId): static
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function getRegistryId(): ?string
    {
        return $this->registryId;
    }

    public function setRegistryId(string $registryId): static
    {
        $this->registryId = $registryId;

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

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getLastModifiedDate(): ?\DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(?\DateTimeImmutable $lastModifiedDate): static
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

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
}
