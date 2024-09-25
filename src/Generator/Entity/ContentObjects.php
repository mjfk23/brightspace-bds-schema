<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ContentObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Content Objects Brightspace Data Set returns information about content topics and modules created for your org
 * units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4713-content-data-sets#content-objects
 */
#[ORM\Entity(repositoryClass: ContentObjectsRepository::class)]
#[ORM\Table(name: 'D2L_CONTENT_OBJECT')]
#[UniqueConstraint(name: 'D2L_CONTENT_OBJECT_PUK', columns: ['ContentObjectId'])]
final class ContentObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the content
     */
    #[ORM\Column(name: 'ContentObjectId', precision: 10, nullable: false)]
    private ?int $contentObjectId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Content title
     */
    #[ORM\Column(name: 'Title', length: 300, nullable: true)]
    private ?string $title = null;

    /**
     * Content object type
     */
    #[ORM\Column(name: 'ContentObjectType', length: 12, nullable: true)]
    private ?string $contentObjectType = null;

    /**
     * Content completion type
     */
    #[ORM\Column(name: 'CompletionType', length: 14, nullable: true)]
    private ?string $completionType = null;

    /**
     * Parent content object identifier
     */
    #[ORM\Column(name: 'ParentContentObjectId', precision: 10, nullable: true)]
    private ?int $parentContentObjectId = null;

    /**
     * Location of the content asset. Field can be null.
     */
    #[ORM\Column(name: 'Location', length: 2048, nullable: true)]
    private ?string $location = null;

    /**
     * Content availability start date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Content availability end date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Content availability due date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * Quick link Object ID for the associated tool. Maps to DropboxId, QuizId, ChecklistId, SurveyId, ChatId,
     * Self-AssessmentId. For Discussions, this field is used if a Forum is quicklinked. Field can be null.
     */
    #[ORM\Column(name: 'ObjectId1', precision: 10, nullable: true)]
    private ?int $objectId1 = null;

    /**
     * Quick link Object ID, only used for the Discussion tool if a Topic is quicklinked. Field can be null.
     */
    #[ORM\Column(name: 'ObjectId2', precision: 10, nullable: true)]
    private ?int $objectId2 = null;

    /**
     * Quick link Object ID, only used for the Discussion tool if a Thread is quicklinked. Field can be null.
     */
    #[ORM\Column(name: 'ObjectId3', precision: 10, nullable: true)]
    private ?int $objectId3 = null;

    /**
     * Date the content was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Content is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Display sort order used for the content objects
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates the number of nested hierarchical levels in the discussion post.
     */
    #[ORM\Column(name: 'Depth', precision: 10, nullable: true)]
    private ?int $depth = null;

    /**
     * Unique identifier for the tool. Field can be null.
     */
    #[ORM\Column(name: 'ToolId', precision: 10, nullable: true)]
    private ?int $toolId = null;

    /**
     * Content object has not been published yet
     */
    #[ORM\Column(name: 'IsHidden', nullable: true)]
    private ?bool $isHidden = null;

    /**
     * Release Condition unique result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    /**
     * Date when the content object was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * User who created the content object. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * User who last modified the content object. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * User who deleted the content object. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getContentObjectId(): ?int
    {
        return $this->contentObjectId;
    }

    public function setContentObjectId(int $contentObjectId): static
    {
        $this->contentObjectId = $contentObjectId;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContentObjectType(): ?string
    {
        return $this->contentObjectType;
    }

    public function setContentObjectType(?string $contentObjectType): static
    {
        $this->contentObjectType = $contentObjectType;

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

    public function getParentContentObjectId(): ?int
    {
        return $this->parentContentObjectId;
    }

    public function setParentContentObjectId(?int $parentContentObjectId): static
    {
        $this->parentContentObjectId = $parentContentObjectId;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

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

    public function getObjectId1(): ?int
    {
        return $this->objectId1;
    }

    public function setObjectId1(?int $objectId1): static
    {
        $this->objectId1 = $objectId1;

        return $this;
    }

    public function getObjectId2(): ?int
    {
        return $this->objectId2;
    }

    public function setObjectId2(?int $objectId2): static
    {
        $this->objectId2 = $objectId2;

        return $this;
    }

    public function getObjectId3(): ?int
    {
        return $this->objectId3;
    }

    public function setObjectId3(?int $objectId3): static
    {
        $this->objectId3 = $objectId3;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

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

    public function getDepth(): ?int
    {
        return $this->depth;
    }

    public function setDepth(?int $depth): static
    {
        $this->depth = $depth;

        return $this;
    }

    public function getToolId(): ?int
    {
        return $this->toolId;
    }

    public function setToolId(?int $toolId): static
    {
        $this->toolId = $toolId;

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

    public function getResultId(): ?int
    {
        return $this->resultId;
    }

    public function setResultId(?int $resultId): static
    {
        $this->resultId = $resultId;

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

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

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

    public function getDeletedBy(): ?int
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?int $deletedBy): static
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }
}
