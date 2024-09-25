<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SurveyObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Survey Objects Brightspace Data Set describes all the surveys in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4538-surveys-data-sets#survey-objects
 */
#[ORM\Entity(repositoryClass: SurveyObjectsRepository::class)]
#[ORM\Table(name: 'D2L_SURVEY_OBJECT')]
#[UniqueConstraint(name: 'D2L_SURVEY_OBJECT_PUK', columns: ['SurveyId'])]
final class SurveyObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique survey identifier.
     */
    #[ORM\Column(name: 'SurveyId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $surveyId = null;

    /**
     * Name of the survey.
     */
    #[ORM\Column(name: 'SurveyName', length: 2000, nullable: true)]
    private ?string $surveyName = null;

    /**
     * Category Id for the survey. Field can be null.
     */
    #[ORM\Column(name: 'CategoryId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $categoryId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Description of the survey. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indicates if the survey description is enabled.
     */
    #[ORM\Column(name: 'DescriptionEnabled', nullable: true)]
    private ?bool $descriptionEnabled = null;

    /**
     * Indicates if the survey provides instant feedback.
     */
    #[ORM\Column(name: 'HasInstantFeedback', nullable: true)]
    private ?bool $hasInstantFeedback = null;

    /**
     * Indicates if the survey results are anonymous.
     */
    #[ORM\Column(name: 'IsAnonymous', nullable: true)]
    private ?bool $isAnonymous = null;

    /**
     * Indicates if the survey is visible or hidden from users.
     */
    #[ORM\Column(name: 'IsVisible', nullable: true)]
    private ?bool $isVisible = null;

    /**
     * Message provided when user submits survey. Field can be null.
     */
    #[ORM\Column(name: 'SubmissionMessage', length: 2000, nullable: true)]
    private ?string $submissionMessage = null;

    /**
     * Footer of the survey. Field can be null.
     */
    #[ORM\Column(name: 'Footer', length: 2000, nullable: true)]
    private ?string $footer = null;

    /**
     * Indicates if the footer is displayed.
     */
    #[ORM\Column(name: 'FooterIsDisplayed', nullable: true)]
    private ?bool $footerIsDisplayed = null;

    /**
     * Start date and time of the survey (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * End date and time of the survey (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Indicates if the survey is displayed in the calendar.
     */
    #[ORM\Column(name: 'DisplayInCalendar', nullable: true)]
    private ?bool $displayInCalendar = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $resultId = null;

    /**
     * Indicates the number of attempts of the survey that a user is allowed to take. Field can be null.
     */
    #[ORM\Column(name: 'AttemptsAllowed', precision: 10, nullable: true)]
    private ?int $attemptsAllowed = null;

    /**
     * Order in which surveys appear in the interface.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Id of the user who created the survey.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * Indicates if the survey is deleted (1) or not (0).
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date when the survey was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Id of the user who last modified the survey.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Name of the category in which the survey belongs. Field can be null.
     */
    #[ORM\Column(name: 'CategoryName', length: 512, nullable: true)]
    private ?string $categoryName = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getSurveyId(): ?string
    {
        return $this->surveyId;
    }

    public function setSurveyId(string $surveyId): static
    {
        $this->surveyId = $surveyId;

        return $this;
    }

    public function getSurveyName(): ?string
    {
        return $this->surveyName;
    }

    public function setSurveyName(?string $surveyName): static
    {
        $this->surveyName = $surveyName;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function isDescriptionEnabled(): ?bool
    {
        return $this->descriptionEnabled;
    }

    public function setDescriptionEnabled(?bool $descriptionEnabled): static
    {
        $this->descriptionEnabled = $descriptionEnabled;

        return $this;
    }

    public function hasInstantFeedback(): ?bool
    {
        return $this->hasInstantFeedback;
    }

    public function setHasInstantFeedback(?bool $hasInstantFeedback): static
    {
        $this->hasInstantFeedback = $hasInstantFeedback;

        return $this;
    }

    public function isAnonymous(): ?bool
    {
        return $this->isAnonymous;
    }

    public function setAnonymous(?bool $isAnonymous): static
    {
        $this->isAnonymous = $isAnonymous;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setVisible(?bool $isVisible): static
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getSubmissionMessage(): ?string
    {
        return $this->submissionMessage;
    }

    public function setSubmissionMessage(?string $submissionMessage): static
    {
        $this->submissionMessage = $submissionMessage;

        return $this;
    }

    public function getFooter(): ?string
    {
        return $this->footer;
    }

    public function setFooter(?string $footer): static
    {
        $this->footer = $footer;

        return $this;
    }

    public function isFooterIsDisplayed(): ?bool
    {
        return $this->footerIsDisplayed;
    }

    public function setFooterIsDisplayed(?bool $footerIsDisplayed): static
    {
        $this->footerIsDisplayed = $footerIsDisplayed;

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

    public function isDisplayInCalendar(): ?bool
    {
        return $this->displayInCalendar;
    }

    public function setDisplayInCalendar(?bool $displayInCalendar): static
    {
        $this->displayInCalendar = $displayInCalendar;

        return $this;
    }

    public function getResultId(): ?string
    {
        return $this->resultId;
    }

    public function setResultId(?string $resultId): static
    {
        $this->resultId = $resultId;

        return $this;
    }

    public function getAttemptsAllowed(): ?int
    {
        return $this->attemptsAllowed;
    }

    public function setAttemptsAllowed(?int $attemptsAllowed): static
    {
        $this->attemptsAllowed = $attemptsAllowed;

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

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(?string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }
}
