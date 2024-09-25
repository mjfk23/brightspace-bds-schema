<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\DiscussionForumsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Discussion Forums Brightspace Data Set returns discussion forums. Results are ordered from newest to oldest.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4525-discussions-data-sets#discussion-forums
 */
#[ORM\Entity(repositoryClass: DiscussionForumsRepository::class)]
#[ORM\Table(name: 'D2L_DISCUSSION_FORUM')]
#[UniqueConstraint(name: 'D2L_DISCUSSION_FORUM_PUK', columns: ['ForumId'])]
final class DiscussionForums
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique forum identifier.
     */
    #[ORM\Column(name: 'ForumId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $forumId = null;

    /**
     * Name of the discussion forum.
     */
    #[ORM\Column(name: 'Name', length: 800, nullable: true)]
    private ?string $name = null;

    /**
     * Description of the discussion forum. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indicates that a user must post in the discussion forum in order to participate in any discussion threads.
     */
    #[ORM\Column(name: 'MustPostToParticipate', nullable: true)]
    private ?bool $mustPostToParticipate = null;

    /**
     * Indicates whether there is anonymous posting permitted for the discussion forum.
     */
    #[ORM\Column(name: 'AllowAnon', nullable: true)]
    private ?bool $allowAnon = null;

    /**
     * Indicates whether the discussion forum is hidden.
     */
    #[ORM\Column(name: 'IsHidden', nullable: true)]
    private ?bool $isHidden = null;

    /**
     * Indicates that the discussion forum requires approval from a moderator before contributions to the forum are
     * posted.
     */
    #[ORM\Column(name: 'RequiresApproval', nullable: true)]
    private ?bool $requiresApproval = null;

    /**
     * Display sort order used for the content objects
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates if the discussion forum is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date when the discussion forum was deleted (UTC). Field can be null
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * User who deleted the discussion forum. Field can be null.
     */
    #[ORM\Column(name: 'DeletedByUserId', precision: 10, nullable: true)]
    private ?int $deletedByUserId = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    /**
     * First date when learners can post to topics in the forum (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Before the StartDate, this type determines whether learners can view or access discussion topics within the
     * forum. See About Availability type for details. Field can be null.
     */
    #[ORM\Column(name: 'StartDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $startDateAvailabilityType = null;

    /**
     * Last date when learners can post to topics in the forum (UTC).
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * After the EndDate, this type determines whether learners can view or access discussion topics within the forum.
     * See About Availability type for details. Field can be null.
     */
    #[ORM\Column(name: 'EndDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $endDateAvailabilityType = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getForumId(): ?string
    {
        return $this->forumId;
    }

    public function setForumId(string $forumId): static
    {
        $this->forumId = $forumId;

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

    public function isMustPostToParticipate(): ?bool
    {
        return $this->mustPostToParticipate;
    }

    public function setMustPostToParticipate(?bool $mustPostToParticipate): static
    {
        $this->mustPostToParticipate = $mustPostToParticipate;

        return $this;
    }

    public function isAllowAnon(): ?bool
    {
        return $this->allowAnon;
    }

    public function setAllowAnon(?bool $allowAnon): static
    {
        $this->allowAnon = $allowAnon;

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

    public function isRequiresApproval(): ?bool
    {
        return $this->requiresApproval;
    }

    public function setRequiresApproval(?bool $requiresApproval): static
    {
        $this->requiresApproval = $requiresApproval;

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

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

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

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

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
}
