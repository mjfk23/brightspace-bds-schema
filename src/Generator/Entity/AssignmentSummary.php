<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AssignmentSummaryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Assignment Summary Brightspace Data Set returns information on the assignments for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4767-assignments-data-sets#assignment-summary
 */
#[ORM\Entity(repositoryClass: AssignmentSummaryRepository::class)]
#[ORM\Table(name: 'D2L_ASSIGNMENT_SUMMARY')]
#[UniqueConstraint(name: 'D2L_ASSIGNMENT_SUMMARY_PUK', columns: ['DropboxId'])]
final class AssignmentSummary
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique assignment identifier
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $dropboxId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Assignment name
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * Assignment category. Field can be null.
     */
    #[ORM\Column(name: 'Category', length: 256, nullable: true)]
    private ?string $category = null;

    /**
     * Individual/group assignment
     */
    #[ORM\Column(name: 'Type', length: 20, nullable: true)]
    private ?string $type = null;

    /**
     * Unique grade item identifier. Field can be null.
     */
    #[ORM\Column(name: 'GradeItemId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $gradeItemId = null;

    /**
     * Possible score a user can achieve on the assignment. Field can be null.
     */
    #[ORM\Column(name: 'PossibleScore', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $possibleScore = null;

    /**
     * Assignment availability start date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Assignment availability end date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Assignment due date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * Is assignment restricted
     */
    #[ORM\Column(name: 'IsRestricted', nullable: true)]
    private ?bool $isRestricted = null;

    /**
     * Is assignment deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Is TurnItIn enabled
     */
    #[ORM\Column(name: 'TurnItInEnabled', nullable: true)]
    private ?bool $turnItInEnabled = null;

    /**
     * True or false value indicating whether the assignment is hidden.
     */
    #[ORM\Column(name: 'IsHidden', nullable: true)]
    private ?bool $isHidden = null;

    /**
     * Display sort order used for the content objects
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates the format submission type for the assignment being submitted. Values for this column include File,
     * Text, On Paper, and Observed.
     */
    #[ORM\Column(name: 'SubmissionType', length: 36, nullable: true)]
    private ?string $submissionType = null;

    /**
     * Indicates how the assignment was completed. Values for this column include OnSubmission, DueDate,
     * ManuallyByLearner, and OnEvaluation.
     */
    #[ORM\Column(name: 'CompletionType', length: 54, nullable: true)]
    private ?string $completionType = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    /**
     * Unique category identifier for the assignment. Field can be null.
     */
    #[ORM\Column(name: 'CategoryId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $categoryId = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Determines whether learners can view or access the assignment before the StartDate. Refer to About Availability
     * Type for details. All assignments with start dates created before December 2022/20.22.12 have default value '0'.
     * Field can be null.
     */
    #[ORM\Column(name: 'StartDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $startDateAvailabilityType = null;

    /**
     * Determines whether learners can view or access the assignment after the EndDate. Refer to About Availability Type
     * for details. All assignments with end dates created before December 2022/20.22.12 have default value '0'. Field
     * can be null.
     */
    #[ORM\Column(name: 'EndDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $endDateAvailabilityType = null;

    /**
     * Indicates whether D2L Lumi (Brightspace AI) capabilities were used and the level of AI involvement. Possible
     * values: 0 - No AI capabilities were involved. 1 - Generated by AI and reviewed by a human. 2 - Generated by AI
     * and edited by a human. 3 - Assisted or uplifted by AI.
     */
    #[ORM\Column(name: 'AIUtilization', precision: 10, nullable: true)]
    private ?int $aIUtilization = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getDropboxId(): ?string
    {
        return $this->dropboxId;
    }

    public function setDropboxId(string $dropboxId): static
    {
        $this->dropboxId = $dropboxId;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

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

    public function getGradeItemId(): ?string
    {
        return $this->gradeItemId;
    }

    public function setGradeItemId(?string $gradeItemId): static
    {
        $this->gradeItemId = $gradeItemId;

        return $this;
    }

    public function getPossibleScore(): ?string
    {
        return $this->possibleScore;
    }

    public function setPossibleScore(?string $possibleScore): static
    {
        $this->possibleScore = $possibleScore;

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

    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeImmutable $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function isRestricted(): ?bool
    {
        return $this->isRestricted;
    }

    public function setRestricted(?bool $isRestricted): static
    {
        $this->isRestricted = $isRestricted;

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

    public function isTurnItInEnabled(): ?bool
    {
        return $this->turnItInEnabled;
    }

    public function setTurnItInEnabled(?bool $turnItInEnabled): static
    {
        $this->turnItInEnabled = $turnItInEnabled;

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

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getSubmissionType(): ?string
    {
        return $this->submissionType;
    }

    public function setSubmissionType(?string $submissionType): static
    {
        $this->submissionType = $submissionType;

        return $this;
    }

    public function getCompletionType(): ?string
    {
        return $this->completionType;
    }

    public function setCompletionType(?string $completionType): static
    {
        $this->completionType = $completionType;

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

    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    public function setCategoryId(?string $categoryId): static
    {
        $this->categoryId = $categoryId;

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

    public function getStartDateAvailabilityType(): ?int
    {
        return $this->startDateAvailabilityType;
    }

    public function setStartDateAvailabilityType(?int $startDateAvailabilityType): static
    {
        $this->startDateAvailabilityType = $startDateAvailabilityType;

        return $this;
    }

    public function getEndDateAvailabilityType(): ?int
    {
        return $this->endDateAvailabilityType;
    }

    public function setEndDateAvailabilityType(?int $endDateAvailabilityType): static
    {
        $this->endDateAvailabilityType = $endDateAvailabilityType;

        return $this;
    }

    public function getAIUtilization(): ?int
    {
        return $this->aIUtilization;
    }

    public function setAIUtilization(?int $aIUtilization): static
    {
        $this->aIUtilization = $aIUtilization;

        return $this;
    }
}
