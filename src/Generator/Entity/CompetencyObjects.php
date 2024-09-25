<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Objects Brightspace Data Set returns the competencies and learning objectives which have been created
 * within your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-objects
 */
#[ORM\Entity(repositoryClass: CompetencyObjectsRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_OBJECT')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_OBJECT_PUK', columns: ['ObjectId'])]
final class CompetencyObjects
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
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Competency name
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Competency type
     */
    #[ORM\Column(name: 'Type', length: 512, nullable: true)]
    private ?string $type = null;

    /**
     * Is flagged as ready for evaluation
     */
    #[ORM\Column(name: 'ReadyForEvaluation', nullable: true)]
    private ?bool $readyForEvaluation = null;

    /**
     * Status of competency: Draft, In Review, Approved, Archived. Field can be null.
     */
    #[ORM\Column(name: 'Status', length: 18, nullable: true)]
    private ?string $status = null;

    /**
     * Competency or learning objective description. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Flag indicating if the competency or learning objective needs to be reevaluated
     */
    #[ORM\Column(name: 'NeedReevaluation', nullable: true)]
    private ?bool $needReevaluation = null;

    /**
     * Determines if reevaluation will occur when the competency or learning objective is updated and the competency or
     * learning objective has already been achieved. Field can be null.
     */
    #[ORM\Column(name: 'ReevaluationIfAchieved', nullable: true)]
    private ?bool $reevaluationIfAchieved = null;

    /**
     * Determines if reevaluation will occur when the competency or learning objective is updated and the competency or
     * learning objective has not been achieved. Field can be null.
     */
    #[ORM\Column(name: 'ReevaluationIfNotAchieved', nullable: true)]
    private ?bool $reevaluationIfNotAchieved = null;

    /**
     * Additional competency or learning objective identifier. Field can be null.
     */
    #[ORM\Column(name: 'AdditionalIdentifier', length: 1024, nullable: true)]
    private ?string $additionalIdentifier = null;

    /**
     * Indicates if the competency is hidden to consumers.
     */
    #[ORM\Column(name: 'IsHidden', nullable: true)]
    private ?bool $isHidden = null;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isReadyForEvaluation(): ?bool
    {
        return $this->readyForEvaluation;
    }

    public function setReadyForEvaluation(?bool $readyForEvaluation): static
    {
        $this->readyForEvaluation = $readyForEvaluation;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

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

    public function isNeedReevaluation(): ?bool
    {
        return $this->needReevaluation;
    }

    public function setNeedReevaluation(?bool $needReevaluation): static
    {
        $this->needReevaluation = $needReevaluation;

        return $this;
    }

    public function isReevaluationIfAchieved(): ?bool
    {
        return $this->reevaluationIfAchieved;
    }

    public function setReevaluationIfAchieved(?bool $reevaluationIfAchieved): static
    {
        $this->reevaluationIfAchieved = $reevaluationIfAchieved;

        return $this;
    }

    public function isReevaluationIfNotAchieved(): ?bool
    {
        return $this->reevaluationIfNotAchieved;
    }

    public function setReevaluationIfNotAchieved(?bool $reevaluationIfNotAchieved): static
    {
        $this->reevaluationIfNotAchieved = $reevaluationIfNotAchieved;

        return $this;
    }

    public function getAdditionalIdentifier(): ?string
    {
        return $this->additionalIdentifier;
    }

    public function setAdditionalIdentifier(?string $additionalIdentifier): static
    {
        $this->additionalIdentifier = $additionalIdentifier;

        return $this;
    }

    public function isHidden(): ?bool
    {
        return $this->isHidden;
    }

    public function setHidden(?bool $isHidden): static
    {
        $this->isHidden = $isHidden;

        return $this;
    }
}
