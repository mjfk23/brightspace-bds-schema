<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ChecklistObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Checklist Objects Brightspace Data Set returns information on checklist attributes.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4523-checklist-data-sets#checklist-objects
 */
#[ORM\Entity(repositoryClass: ChecklistObjectsRepository::class)]
#[ORM\Table(name: 'D2L_CHECKLIST_OBJECT')]
#[UniqueConstraint(name: 'D2L_CHECKLIST_OBJECT_PUK', columns: ['ChecklistId'])]
final class ChecklistObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique checklist identifier.
     */
    #[ORM\Column(name: 'ChecklistId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $checklistId = null;

    /**
     * Unique identifier for the org unit where the checklist exists.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Checklist name.
     */
    #[ORM\Column(name: 'Name', length: 1024, nullable: true)]
    private ?string $name = null;

    /**
     * Description of the checklist. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indication if the description is in HTML.
     */
    #[ORM\Column(name: 'DescriptionIsHtml', nullable: true)]
    private ?bool $descriptionIsHtml = null;

    /**
     * Unique user Id that the checklist is shared with. Field can be null.
     */
    #[ORM\Column(name: 'SharedUserId', precision: 10, nullable: true)]
    private ?int $sharedUserId = null;

    /**
     * Indicates if the checklist appears in a new browser window when viewed.
     */
    #[ORM\Column(name: 'DisplayInNewWindow', nullable: true)]
    private ?bool $displayInNewWindow = null;

    /**
     * The order in which the checklist is sorted.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates the version for this row entry. Field can be null.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    /**
     * Date the checklist item was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * User who deleted the checklist item. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getChecklistId(): ?string
    {
        return $this->checklistId;
    }

    public function setChecklistId(string $checklistId): static
    {
        $this->checklistId = $checklistId;

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

    public function getSharedUserId(): ?int
    {
        return $this->sharedUserId;
    }

    public function setSharedUserId(?int $sharedUserId): static
    {
        $this->sharedUserId = $sharedUserId;

        return $this;
    }

    public function isDisplayInNewWindow(): ?bool
    {
        return $this->displayInNewWindow;
    }

    public function setDisplayInNewWindow(?bool $displayInNewWindow): static
    {
        $this->displayInNewWindow = $displayInNewWindow;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

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
}
