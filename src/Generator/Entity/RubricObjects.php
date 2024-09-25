<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Rubric Objects Brightspace Data Set returns information about the rubric properties.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubric-objects
 */
#[ORM\Entity(repositoryClass: RubricObjectsRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_OBJECT')]
#[UniqueConstraint(name: 'D2L_RUBRIC_OBJECT_PUK', columns: ['RubricId'])]
final class RubricObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique rubric Identifier
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $rubricId = null;

    /**
     * Name of the rubric
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Status of the rubric. Field can be null.
     */
    #[ORM\Column(name: 'RubricStatus', length: 512, nullable: true)]
    private ?string $rubricStatus = null;

    /**
     * Description of the rubric object. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Type of rubric used. Field can be null.
     */
    #[ORM\Column(name: 'RubricType', length: 512, nullable: true)]
    private ?string $rubricType = null;

    /**
     * Type of scoring methods used. Field can be null.
     */
    #[ORM\Column(name: 'ScoringMethods', length: 512, nullable: true)]
    private ?string $scoringMethods = null;

    /**
     * Is the rubric score visible
     */
    #[ORM\Column(name: 'IsScoreVisible', nullable: true)]
    private ?bool $isScoreVisible = null;

    /**
     * Org unit identifier associated with the rubric
     */
    #[ORM\Column(name: 'OrgUnitID', precision: 10, nullable: true)]
    private ?int $orgUnitID = null;

    /**
     * Set to true if the Rubric object is shared
     */
    #[ORM\Column(name: 'IsShared', nullable: true)]
    private ?bool $isShared = null;

    /**
     * Set to true if the rubric object is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRubricId(): ?string
    {
        return $this->rubricId;
    }

    public function setRubricId(string $rubricId): static
    {
        $this->rubricId = $rubricId;

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

    public function getRubricStatus(): ?string
    {
        return $this->rubricStatus;
    }

    public function setRubricStatus(?string $rubricStatus): static
    {
        $this->rubricStatus = $rubricStatus;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRubricType(): ?string
    {
        return $this->rubricType;
    }

    public function setRubricType(?string $rubricType): static
    {
        $this->rubricType = $rubricType;

        return $this;
    }

    public function getScoringMethods(): ?string
    {
        return $this->scoringMethods;
    }

    public function setScoringMethods(?string $scoringMethods): static
    {
        $this->scoringMethods = $scoringMethods;

        return $this;
    }

    public function isScoreVisible(): ?bool
    {
        return $this->isScoreVisible;
    }

    public function setScoreVisible(?bool $isScoreVisible): static
    {
        $this->isScoreVisible = $isScoreVisible;

        return $this;
    }

    public function getOrgUnitID(): ?int
    {
        return $this->orgUnitID;
    }

    public function setOrgUnitID(?int $orgUnitID): static
    {
        $this->orgUnitID = $orgUnitID;

        return $this;
    }

    public function isShared(): ?bool
    {
        return $this->isShared;
    }

    public function setShared(?bool $isShared): static
    {
        $this->isShared = $isShared;

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
