<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradeObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Objects Brightspace Data Set returns a list of the grade objects created for your org units. The data set
 * returns a NULL grade scheme value when the grade item is using the default scheme.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-objects
 */
#[ORM\Entity(repositoryClass: GradeObjectsRepository::class)]
#[ORM\Table(name: 'D2L_GRADE_OBJECT')]
#[UniqueConstraint(name: 'D2L_GRADE_OBJECT_PUK', columns: ['GradeObjectId'])]
final class GradeObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique grade object identifier
     */
    #[ORM\Column(name: 'GradeObjectId', precision: 10, nullable: false)]
    private ?int $gradeObjectId = null;

    /**
     * Unique org unit identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Parent grade object identifier. Note: Categories are considered Parent grade objects. Category names can be
     * determined by using the ParentGradeObjectId and joining the data set to itself. Field can be null.
     */
    #[ORM\Column(name: 'ParentGradeObjectId', precision: 10, nullable: true)]
    private ?int $parentGradeObjectId = null;

    /**
     * Grade object name
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * Grade object type name. Field can be null.
     */
    #[ORM\Column(name: 'TypeName', length: 100, nullable: true)]
    private ?string $typeName = null;

    /**
     * Start date for the grade object (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * End date for the grade object (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Indicates if the object is automatically pointed. If this contains a value, the object automatically has points
     * assigned; if it is set to 0, then the grade object must manually have points assigned.
     */
    #[ORM\Column(name: 'IsAutoPointed', nullable: true)]
    private ?bool $isAutoPointed = null;

    /**
     * Is a formula associated with the grade object
     */
    #[ORM\Column(name: 'IsFormula', nullable: true)]
    private ?bool $isFormula = null;

    /**
     * Is bonus grade
     */
    #[ORM\Column(name: 'IsBonus', nullable: true)]
    private ?bool $isBonus = null;

    /**
     * Maximum points achievable in this grade
     */
    #[ORM\Column(name: 'MaxPoints', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $maxPoints = null;

    /**
     * Can user get more than maximum points
     */
    #[ORM\Column(name: 'CanExceedMaxGrade', nullable: true)]
    private ?bool $canExceedMaxGrade = null;

    /**
     * Is grade excluded from final grade calculation
     */
    #[ORM\Column(name: 'ExcludeFromFinalGradeCalc', nullable: true)]
    private ?bool $excludeFromFinalGradeCalc = null;

    /**
     * Unique grade scheme identifier. This column returns a null result when the grade item is set to use default
     * scheme. This is intended. Field can be null.
     */
    #[ORM\Column(name: 'GradeSchemeId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $gradeSchemeId = null;

    /**
     * Weight associated with the grade. Field can be null.
     */
    #[ORM\Column(name: 'Weight', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weight = null;

    /**
     * Drop number of lowest grades from the calculated grade
     */
    #[ORM\Column(name: 'NumLowestGradesToDrop', precision: 10, nullable: true)]
    private ?int $numLowestGradesToDrop = null;

    /**
     * Drop number of highest grades from the calculated grade
     */
    #[ORM\Column(name: 'NumHighestGradesToDrop', precision: 10, nullable: true)]
    private ?int $numHighestGradesToDrop = null;

    /**
     * Grade weight distribution within category. Field can be null.
     */
    #[ORM\Column(name: 'WeightDistributionType', length: 16, nullable: true)]
    private ?string $weightDistributionType = null;

    /**
     * Date the grade was created (UTC). Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * Tool associated with the object. Field can be null.
     */
    #[ORM\Column(name: 'ToolName', length: 100, nullable: true)]
    private ?string $toolName = null;

    /**
     * Unique activity ID associated with the grade object: Dropbox ID, Quiz ID, Discussion ID. Field can be null.
     */
    #[ORM\Column(name: 'AssociatedToolItemId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $associatedToolItemId = null;

    /**
     * Last time the grade was modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * The item or category short name as per the corresponding field in Brightspace. Field can be null.
     */
    #[ORM\Column(name: 'ShortName', length: 256, nullable: true)]
    private ?string $shortName = null;

    /**
     * ID of the grade object type. Possible values:
     */
    #[ORM\Column(name: 'GradeObjectTypeId', precision: 10, nullable: true)]
    private ?int $gradeObjectTypeId = null;

    /**
     * Specified sort order of grade objects
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates if the grade object is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date the grade object was soft deleted. Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * ID of the user who deleted the grade object. Field can be null.
     */
    #[ORM\Column(name: 'DeletedByUserId', precision: 10, nullable: true)]
    private ?int $deletedByUserId = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getGradeObjectId(): ?int
    {
        return $this->gradeObjectId;
    }

    public function setGradeObjectId(int $gradeObjectId): static
    {
        $this->gradeObjectId = $gradeObjectId;

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

    public function getParentGradeObjectId(): ?int
    {
        return $this->parentGradeObjectId;
    }

    public function setParentGradeObjectId(?int $parentGradeObjectId): static
    {
        $this->parentGradeObjectId = $parentGradeObjectId;

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

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(?string $typeName): static
    {
        $this->typeName = $typeName;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function isAutoPointed(): ?bool
    {
        return $this->isAutoPointed;
    }

    public function setAutoPointed(?bool $isAutoPointed): static
    {
        $this->isAutoPointed = $isAutoPointed;

        return $this;
    }

    public function isFormula(): ?bool
    {
        return $this->isFormula;
    }

    public function setFormula(?bool $isFormula): static
    {
        $this->isFormula = $isFormula;

        return $this;
    }

    public function isBonus(): ?bool
    {
        return $this->isBonus;
    }

    public function setBonus(?bool $isBonus): static
    {
        $this->isBonus = $isBonus;

        return $this;
    }

    public function getMaxPoints(): ?string
    {
        return $this->maxPoints;
    }

    public function setMaxPoints(?string $maxPoints): static
    {
        $this->maxPoints = $maxPoints;

        return $this;
    }

    public function isCanExceedMaxGrade(): ?bool
    {
        return $this->canExceedMaxGrade;
    }

    public function setCanExceedMaxGrade(?bool $canExceedMaxGrade): static
    {
        $this->canExceedMaxGrade = $canExceedMaxGrade;

        return $this;
    }

    public function isExcludeFromFinalGradeCalc(): ?bool
    {
        return $this->excludeFromFinalGradeCalc;
    }

    public function setExcludeFromFinalGradeCalc(?bool $excludeFromFinalGradeCalc): static
    {
        $this->excludeFromFinalGradeCalc = $excludeFromFinalGradeCalc;

        return $this;
    }

    public function getGradeSchemeId(): ?string
    {
        return $this->gradeSchemeId;
    }

    public function setGradeSchemeId(?string $gradeSchemeId): static
    {
        $this->gradeSchemeId = $gradeSchemeId;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getNumLowestGradesToDrop(): ?int
    {
        return $this->numLowestGradesToDrop;
    }

    public function setNumLowestGradesToDrop(?int $numLowestGradesToDrop): static
    {
        $this->numLowestGradesToDrop = $numLowestGradesToDrop;

        return $this;
    }

    public function getNumHighestGradesToDrop(): ?int
    {
        return $this->numHighestGradesToDrop;
    }

    public function setNumHighestGradesToDrop(?int $numHighestGradesToDrop): static
    {
        $this->numHighestGradesToDrop = $numHighestGradesToDrop;

        return $this;
    }

    public function getWeightDistributionType(): ?string
    {
        return $this->weightDistributionType;
    }

    public function setWeightDistributionType(?string $weightDistributionType): static
    {
        $this->weightDistributionType = $weightDistributionType;

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

    public function getToolName(): ?string
    {
        return $this->toolName;
    }

    public function setToolName(?string $toolName): static
    {
        $this->toolName = $toolName;

        return $this;
    }

    public function getAssociatedToolItemId(): ?string
    {
        return $this->associatedToolItemId;
    }

    public function setAssociatedToolItemId(?string $associatedToolItemId): static
    {
        $this->associatedToolItemId = $associatedToolItemId;

        return $this;
    }

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): static
    {
        $this->shortName = $shortName;

        return $this;
    }

    public function getGradeObjectTypeId(): ?int
    {
        return $this->gradeObjectTypeId;
    }

    public function setGradeObjectTypeId(?int $gradeObjectTypeId): static
    {
        $this->gradeObjectTypeId = $gradeObjectTypeId;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getDeletedDate(): ?\DateTimeImmutable
    {
        return $this->deletedDate;
    }

    public function setDeletedDate(?\DateTimeImmutable $deletedDate): static
    {
        $this->deletedDate = $deletedDate;

        return $this;
    }

    public function getDeletedByUserId(): ?int
    {
        return $this->deletedByUserId;
    }

    public function setDeletedByUserId(?int $deletedByUserId): static
    {
        $this->deletedByUserId = $deletedByUserId;

        return $this;
    }

    public function getResultId(): ?int
    {
        return $this->resultId;
    }

    public function setResultId(?int $resultId): static
    {
        $this->resultId = $resultId;

        return $this;
    }
}
