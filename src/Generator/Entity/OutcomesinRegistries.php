<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesinRegistriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Outcomes in Registries Brightspace Data Set provides details of which outcomes belong to which registries for all
 * your org units. It can be used to list all outcomes in the intent list of a course, or all the outcomes in a program.
 * The only available data for org unit owned registries is from June 2021 onwards. All data for program registries is
 * available, starting with your organization's first use of Learning Outcomes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-in-registries
 */
#[ORM\Entity(repositoryClass: OutcomesinRegistriesRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_REGISTRY')]
#[UniqueConstraint(name: 'D2L_OUTCOME_REGISTRY_PUK', columns: ['OutcomeId', 'RegistryId'])]
final class OutcomesinRegistries
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID of this Outcome in the Outcome Details data set.
     */
    #[ORM\Column(name: 'OutcomeId', type: Types::GUID, nullable: false)]
    private ?string $outcomeId = null;

    /**
     * ID of registry representing the context in which this outcome exists.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: false)]
    private ?string $registryId = null;

    /**
     * For imported outcomes, the date that this outcome was mapped to the registry (UTC). For authored outcomes, the
     * date this outcome was created. Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * ID of user who imported or created the outcome in the registry. Field can be null.
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

    public function getOutcomeId(): ?string
    {
        return $this->outcomeId;
    }

    public function setOutcomeId(string $outcomeId): static
    {
        $this->outcomeId = $outcomeId;

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
