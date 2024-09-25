<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OutcomesScaleLevelDefinitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Outcomes Scale Level Definition Brightspace Data Set, each entry represents a scale level defined in your
 * scales. On the evaluation UI, they are represented by a single, clickable "frame". Examples include "Not Yet
 * Achieved", "Achieved", and "Mastered". Scale levels can't be deleted once created. Scale levels become inaccessible
 * when their parent scale is deleted. All data for the data set is available, starting with your organization's first
 * use of Learning Outcomes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4796-outcomes-data-sets#outcomes-scale-level-definition
 */
#[ORM\Entity(repositoryClass: OutcomesScaleLevelDefinitionRepository::class)]
#[ORM\Table(name: 'D2L_OUTCOME_SCALE_LEVEL_DEFINITION')]
#[UniqueConstraint(name: 'D2L_OUTCOME_SCALE_LEVEL_DEFINITION_PUK', columns: ['ScaleLevelId'])]
final class OutcomesScaleLevelDefinition
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * ID for this scale level.
     */
    #[ORM\Column(name: 'ScaleLevelId', type: Types::GUID, nullable: false)]
    private ?string $scaleLevelId = null;

    /**
     * ID of the parent scale.
     */
    #[ORM\Column(name: 'ScaleId', type: Types::GUID, nullable: true)]
    private ?string $scaleId = null;

    /**
     * Name of this scale level.
     */
    #[ORM\Column(name: 'Name', length: 2000, nullable: true)]
    private ?string $name = null;

    /**
     * Determines ordering for this scale level.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * The score percentage threshold boundary for this scale level. This value is used when automatically suggesting a
     * scale level from numeric assessment results. Field can be null.
     */
    #[ORM\Column(name: 'PercentageRangeStart', precision: 10, nullable: true)]
    private ?int $percentageRangeStart = null;

    /**
     * Color of this scale level in HTML hex notation.
     */
    #[ORM\Column(name: 'RGB', length: 80, nullable: true)]
    private ?string $rGB = null;

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

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getScaleLevelId(): ?string
    {
        return $this->scaleLevelId;
    }

    public function setScaleLevelId(string $scaleLevelId): static
    {
        $this->scaleLevelId = $scaleLevelId;

        return $this;
    }

    public function getScaleId(): ?string
    {
        return $this->scaleId;
    }

    public function setScaleId(?string $scaleId): static
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

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getPercentageRangeStart(): ?int
    {
        return $this->percentageRangeStart;
    }

    public function setPercentageRangeStart(?int $percentageRangeStart): static
    {
        $this->percentageRangeStart = $percentageRangeStart;

        return $this;
    }

    public function getRGB(): ?string
    {
        return $this->rGB;
    }

    public function setRGB(?string $rGB): static
    {
        $this->rGB = $rGB;

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
}
