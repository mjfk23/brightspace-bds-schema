<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RubricsEditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Rubrics Edit Brightspace Data Set, each row represents one element of a rubric that was changed by a
 * permissioned user. If multiple elements are changed in the same rubric, multiple data rows will appear in the data
 * set.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4535-rubrics-data-sets#rubrics-edit
 */
#[ORM\Entity(repositoryClass: RubricsEditRepository::class)]
#[ORM\Table(name: 'D2L_RUBRIC_EDIT')]
#[UniqueConstraint(name: 'D2L_RUBRIC_EDIT_PUK', columns: ['AuditLogId'])]
final class RubricsEdit
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier
     */
    #[ORM\Column(name: 'AuditLogId', type: Types::GUID, nullable: false)]
    private ?string $auditLogId = null;

    /**
     * Unique rubric identifier
     */
    #[ORM\Column(name: 'RubricId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $rubricId = null;

    /**
     * Identifier for the criterion row of the rubric. Field can be null.
     */
    #[ORM\Column(name: 'CriterionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $criterionId = null;

    /**
     * Identifier for the evaluation level of the rubric. Field can be null.
     */
    #[ORM\Column(name: 'LevelId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $levelId = null;

    /**
     * ID of the user who last modified this item
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

    /**
     * Rubric element that has been edited. Refer to Modified Object Type Lookup for details.
     */
    #[ORM\Column(name: 'ModifiedObjectType', precision: 10, nullable: true)]
    private ?int $modifiedObjectType = null;

    /**
     * Identifier for the criterion group to which the criterion belongs. Field can be null.
     */
    #[ORM\Column(name: 'CriteriaGroupId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $criteriaGroupId = null;

    /**
     * The date when this item was modified (UTC)
     */
    #[ORM\Column(name: 'ModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $modifiedDate = null;

    /**
     * The value of the object prior to the modification.
     */
    #[ORM\Column(name: 'PreviousValue', length: 4000, nullable: true)]
    private ?string $previousValue = null;

    /**
     * The value of the object after the modification.
     */
    #[ORM\Column(name: 'ModifiedValue', length: 4000, nullable: true)]
    private ?string $modifiedValue = null;

    /**
     * The locked status of the rubric at the time of the modification
     */
    #[ORM\Column(name: 'IsLocked', nullable: true)]
    private ?bool $isLocked = null;

    /**
     * Incrementing sequence number to keep track of edits that were made during the same session.
     */
    #[ORM\Column(name: 'Version', precision: 10, nullable: true)]
    private ?int $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAuditLogId(): ?string
    {
        return $this->auditLogId;
    }

    public function setAuditLogId(string $auditLogId): static
    {
        $this->auditLogId = $auditLogId;

        return $this;
    }

    public function getRubricId(): ?string
    {
        return $this->rubricId;
    }

    public function setRubricId(?string $rubricId): static
    {
        $this->rubricId = $rubricId;

        return $this;
    }

    public function getCriterionId(): ?string
    {
        return $this->criterionId;
    }

    public function setCriterionId(?string $criterionId): static
    {
        $this->criterionId = $criterionId;

        return $this;
    }

    public function getLevelId(): ?string
    {
        return $this->levelId;
    }

    public function setLevelId(?string $levelId): static
    {
        $this->levelId = $levelId;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getModifiedObjectType(): ?int
    {
        return $this->modifiedObjectType;
    }

    public function setModifiedObjectType(?int $modifiedObjectType): static
    {
        $this->modifiedObjectType = $modifiedObjectType;

        return $this;
    }

    public function getCriteriaGroupId(): ?string
    {
        return $this->criteriaGroupId;
    }

    public function setCriteriaGroupId(?string $criteriaGroupId): static
    {
        $this->criteriaGroupId = $criteriaGroupId;

        return $this;
    }

    public function getModifiedDate(): ?\DateTimeImmutable
    {
        return $this->modifiedDate;
    }

    public function setModifiedDate(?\DateTimeImmutable $modifiedDate): static
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    public function getPreviousValue(): ?string
    {
        return $this->previousValue;
    }

    public function setPreviousValue(?string $previousValue): static
    {
        $this->previousValue = $previousValue;

        return $this;
    }

    public function getModifiedValue(): ?string
    {
        return $this->modifiedValue;
    }

    public function setModifiedValue(?string $modifiedValue): static
    {
        $this->modifiedValue = $modifiedValue;

        return $this;
    }

    public function isLocked(): ?bool
    {
        return $this->isLocked;
    }

    public function setLocked(?bool $isLocked): static
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): static
    {
        $this->version = $version;

        return $this;
    }
}
