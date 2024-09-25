<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ReleaseConditionObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Release Condition Objects Brightspace Data Set returns all the release conditions (prerequisites and results)
 * that have been created in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4533-release-conditions-data-sets#release-condition-objects
 */
#[ORM\Entity(repositoryClass: ReleaseConditionObjectsRepository::class)]
#[ORM\Table(name: 'D2L_RELEASE_CONDITION_OBJECT')]
#[UniqueConstraint(name: 'D2L_RELEASE_CONDITION_OBJECT_PUK', columns: ['PreRequisiteId', 'ResultId', 'OrgUnitId'])]
final class ReleaseConditionObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique pre-requisite identifier.
     */
    #[ORM\Column(name: 'PreRequisiteId', precision: 10, nullable: false)]
    private ?int $preRequisiteId = null;

    /**
     * Unique result identifier.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: false)]
    private ?int $resultId = null;

    /**
     * Unique organization identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Pre-requisite condition name.
     */
    #[ORM\Column(name: 'Name', length: 128, nullable: true)]
    private ?string $name = null;

    /**
     * Indicates if the condition relies on something not happening.
     */
    #[ORM\Column(name: 'IsNegativeCondition', nullable: true)]
    private ?bool $isNegativeCondition = null;

    /**
     * Unique pre-requisite tool identifier.
     */
    #[ORM\Column(name: 'PreRequisiteToolId', precision: 10, nullable: true)]
    private ?int $preRequisiteToolId = null;

    /**
     * Unique identifier for the pre-requisite tool. Field can be null.
     */
    #[ORM\Column(name: 'Id1', precision: 10, nullable: true)]
    private ?int $id1 = null;

    /**
     * Secondary unique identifier for the pre-requisite tool when needed. Field can be null.
     */
    #[ORM\Column(name: 'Id2', precision: 10, nullable: true)]
    private ?int $id2 = null;

    /**
     * Unique identifier for the result tool.
     */
    #[ORM\Column(name: 'ResultToolId', precision: 10, nullable: true)]
    private ?int $resultToolId = null;

    /**
     * Indicates if the pre-requisite is looking at a grade percentage.
     */
    #[ORM\Column(name: 'UsesPercentage', nullable: true)]
    private ?bool $usesPercentage = null;

    /**
     * Defines where all or any of the pre-requisites need to be met. Field can be null.
     */
    #[ORM\Column(name: 'OperatorTypeDesc', length: 6, nullable: true)]
    private ?string $operatorTypeDesc = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Unique identifier for the pre-requisite tool. For a release condition object based on Outcomes, value will match
     * the ObjectId of the Outcome.Field can be null
     */
    #[ORM\Column(name: 'Guid1', type: Types::GUID, nullable: true)]
    private ?string $guid1 = null;

    /**
     * Unique identifier for the pre-requisite tool. For a release condition object based on Outcomes, value will match
     * the ScaleLevelId of the Outcome.Field can be null.
     */
    #[ORM\Column(name: 'Guid2', type: Types::GUID, nullable: true)]
    private ?string $guid2 = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getPreRequisiteId(): ?int
    {
        return $this->preRequisiteId;
    }

    public function setPreRequisiteId(int $preRequisiteId): static
    {
        $this->preRequisiteId = $preRequisiteId;

        return $this;
    }

    public function getResultId(): ?int
    {
        return $this->resultId;
    }

    public function setResultId(int $resultId): static
    {
        $this->resultId = $resultId;

        return $this;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isNegativeCondition(): ?bool
    {
        return $this->isNegativeCondition;
    }

    public function setNegativeCondition(?bool $isNegativeCondition): static
    {
        $this->isNegativeCondition = $isNegativeCondition;

        return $this;
    }

    public function getPreRequisiteToolId(): ?int
    {
        return $this->preRequisiteToolId;
    }

    public function setPreRequisiteToolId(?int $preRequisiteToolId): static
    {
        $this->preRequisiteToolId = $preRequisiteToolId;

        return $this;
    }

    public function getId1(): ?int
    {
        return $this->id1;
    }

    public function setId1(?int $id1): static
    {
        $this->id1 = $id1;

        return $this;
    }

    public function getId2(): ?int
    {
        return $this->id2;
    }

    public function setId2(?int $id2): static
    {
        $this->id2 = $id2;

        return $this;
    }

    public function getResultToolId(): ?int
    {
        return $this->resultToolId;
    }

    public function setResultToolId(?int $resultToolId): static
    {
        $this->resultToolId = $resultToolId;

        return $this;
    }

    public function isUsesPercentage(): ?bool
    {
        return $this->usesPercentage;
    }

    public function setUsesPercentage(?bool $usesPercentage): static
    {
        $this->usesPercentage = $usesPercentage;

        return $this;
    }

    public function getOperatorTypeDesc(): ?string
    {
        return $this->operatorTypeDesc;
    }

    public function setOperatorTypeDesc(?string $operatorTypeDesc): static
    {
        $this->operatorTypeDesc = $operatorTypeDesc;

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

    public function getGuid1(): ?string
    {
        return $this->guid1;
    }

    public function setGuid1(?string $guid1): static
    {
        $this->guid1 = $guid1;

        return $this;
    }

    public function getGuid2(): ?string
    {
        return $this->guid2;
    }

    public function setGuid2(?string $guid2): static
    {
        $this->guid2 = $guid2;

        return $this;
    }
}
