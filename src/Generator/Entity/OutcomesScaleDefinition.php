<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesScaleDefinitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Outcomes Scale Definition Brightspace Data Set, each entry represents an achievement scale defined at the
 * organization level. All data for the data set is available, starting with your organization's first use of Learning
 * Outcomes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-scale-definition
 */
#[ORM\Entity(repositoryClass: OutcomesScaleDefinitionRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_SCALE_DEFINITION')]
#[UniqueConstraint(name: 'D2L_OUTCOME_SCALE_DEFINITION_PUK', columns: ['ScaleId'])]
final class OutcomesScaleDefinition
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID for this scale.
     */
    #[ORM\Column(name: 'ScaleId', type: Types::GUID, nullable: false)]
    private ?string $scaleId = null;

    /**
     * Name of this scale.
     */
    #[ORM\Column(name: 'Name', length: 2000, nullable: true)]
    private ?string $name = null;

    /**
     * Indicates if this is the scale used by default whenever an assessment of an outcome takes place.
     */
    #[ORM\Column(name: 'IsDefault', nullable: true)]
    private ?bool $isDefault = null;

    /**
     * Indicates if percentage ranges are specified for each scale level. This is used when suggesting a scale level for
     * an assessment. Specific percentage threshold values are associated with each Scale Level.
     */
    #[ORM\Column(name: 'UsePercentages', nullable: true)]
    private ?bool $usePercentages = null;

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

    /**
     * ID of registry that owns this scale.
     */
    #[ORM\Column(name: 'RegistryId', type: Types::GUID, nullable: true)]
    private ?string $registryId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getScaleId(): ?string
    {
        return $this->scaleId;
    }

    public function setScaleId(string $scaleId): static
    {
        $this->scaleId = $scaleId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setDefault(?bool $isDefault): static
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    public function isUsePercentages(): ?bool
    {
        return $this->usePercentages;
    }

    public function setUsePercentages(?bool $usePercentages): static
    {
        $this->usePercentages = $usePercentages;

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

    public function getRegistryId(): ?string
    {
        return $this->registryId;
    }

    public function setRegistryId(?string $registryId): static
    {
        $this->registryId = $registryId;

        return $this;
    }
}
