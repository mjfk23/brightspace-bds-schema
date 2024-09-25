<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AnnouncementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Announcements Brightspace Data Set returns details on the announcements a user has created for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4723-announcements-data-sets#announcements
 */
#[ORM\Entity(repositoryClass: AnnouncementsRepository::class)]
#[ORM\Table(name: 'D2L_ANNOUNCEMENT')]
#[UniqueConstraint(name: 'D2L_ANNOUNCEMENT_PUK', columns: ['AnnouncementId'])]
final class Announcements
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique announcement identifier
     */
    #[ORM\Column(name: 'AnnouncementId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $announcementId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * Announcement title
     */
    #[ORM\Column(name: 'Title', length: 800, nullable: true)]
    private ?string $title = null;

    /**
     * First time the announcement is visible (UTC).
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Last date the announcement is visible (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * If new items are visible across orgs
     */
    #[ORM\Column(name: 'IsGlobal', nullable: true)]
    private ?bool $isGlobal = null;

    /**
     * If in draft, then the announcement has not been published yet
     */
    #[ORM\Column(name: 'IsDraft', nullable: true)]
    private ?bool $isDraft = null;

    /**
     * Number of attachments
     */
    #[ORM\Column(name: 'NumAttachments', precision: 10, nullable: true)]
    private ?int $numAttachments = null;

    /**
     * Date the announcement was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * Deleted by user ID. Field can be null.
     */
    #[ORM\Column(name: 'DeletedByUserId', precision: 10, nullable: true)]
    private ?int $deletedByUserId = null;

    /**
     * Last modified date/time (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the announcement. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * User who created the announcement. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', precision: 10, nullable: true)]
    private ?int $createdBy = null;

    /**
     * If author information is displayed.
     */
    #[ORM\Column(name: 'IsAuthorInfoShown', nullable: true)]
    private ?bool $isAuthorInfoShown = null;

    /**
     * Date the announcement was created (UTC). Field can be null.
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $resultId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAnnouncementId(): ?string
    {
        return $this->announcementId;
    }

    public function setAnnouncementId(string $announcementId): static
    {
        $this->announcementId = $announcementId;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?string $orgUnitId): static
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

    public function isGlobal(): ?bool
    {
        return $this->isGlobal;
    }

    public function setGlobal(?bool $isGlobal): static
    {
        $this->isGlobal = $isGlobal;

        return $this;
    }

    public function isDraft(): ?bool
    {
        return $this->isDraft;
    }

    public function setDraft(?bool $isDraft): static
    {
        $this->isDraft = $isDraft;

        return $this;
    }

    public function getNumAttachments(): ?int
    {
        return $this->numAttachments;
    }

    public function setNumAttachments(?int $numAttachments): static
    {
        $this->numAttachments = $numAttachments;

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

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function isAuthorInfoShown(): ?bool
    {
        return $this->isAuthorInfoShown;
    }

    public function setAuthorInfoShown(?bool $isAuthorInfoShown): static
    {
        $this->isAuthorInfoShown = $isAuthorInfoShown;

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

    public function getResultId(): ?string
    {
        return $this->resultId;
    }

    public function setResultId(?string $resultId): static
    {
        $this->resultId = $resultId;

        return $this;
    }
}
