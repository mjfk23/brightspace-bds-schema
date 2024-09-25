<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ChecklistItemDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Checklist Item Details Brightspace Data Set returns information on each checklist item within a checklist.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4523-checklist-data-sets#checklist-item-details
 */
#[ORM\Entity(repositoryClass: ChecklistItemDetailsRepository::class)]
#[ORM\Table(name: 'D2L_CHECKLIST_ITEM_DETAIL')]
#[UniqueConstraint(name: 'D2L_CHECKLIST_ITEM_DETAIL_PUK', columns: ['ItemId'])]
final class ChecklistItemDetails
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique checklist item identifier.
     */
    #[ORM\Column(name: 'ItemId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $itemId = null;

    /**
     * Unique category identifier. Field can be null.
     */
    #[ORM\Column(name: 'CategoryId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $categoryId = null;

    /**
     * Checklist item name. Field can be null.
     */
    #[ORM\Column(name: 'Name', length: 1024, nullable: true)]
    private ?string $name = null;

    /**
     * Checklist item description. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indicates if the description is in HTML.
     */
    #[ORM\Column(name: 'DescriptionIsHtml', nullable: true)]
    private ?bool $descriptionIsHtml = null;

    /**
     * Date the item is due. Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * Indicates the schedule to which this checklist belongs. Field can be null.
     */
    #[ORM\Column(name: 'ScheduleId', precision: 10, nullable: true)]
    private ?int $scheduleId = null;

    /**
     * The order in which the checklist items are sorted.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates if the checklist item is automatically selected.
     */
    #[ORM\Column(name: 'IsAutoChecked', nullable: true)]
    private ?bool $isAutoChecked = null;

    /**
     * Last modified date/time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedUtc', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedUtc = null;

    /**
     * Date the item was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * User who deleted the checklist item. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    /**
     * Indicates the version of the checklist item.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(string $itemId): static
    {
        $this->itemId = $itemId;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function isDescriptionIsHtml(): ?bool
    {
        return $this->descriptionIsHtml;
    }

    public function setDescriptionIsHtml(?bool $descriptionIsHtml): static
    {
        $this->descriptionIsHtml = $descriptionIsHtml;

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

    public function getScheduleId(): ?int
    {
        return $this->scheduleId;
    }

    public function setScheduleId(?int $scheduleId): static
    {
        $this->scheduleId = $scheduleId;

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

    public function isAutoChecked(): ?bool
    {
        return $this->isAutoChecked;
    }

    public function setAutoChecked(?bool $isAutoChecked): static
    {
        $this->isAutoChecked = $isAutoChecked;

        return $this;
    }

    public function getLastModifiedUtc(): ?\DateTimeImmutable
    {
        return $this->lastModifiedUtc;
    }

    public function setLastModifiedUtc(?\DateTimeImmutable $lastModifiedUtc): static
    {
        $this->lastModifiedUtc = $lastModifiedUtc;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
