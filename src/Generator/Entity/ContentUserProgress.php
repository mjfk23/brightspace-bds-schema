<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ContentUserProgressRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Content User Progress Brightspace Data Set returns user progress records modified in the past three calendar
 * years. Results are ordered from newest to oldest. The data set is limited to 3 years of data (all of the previous two
 * calendar years and the current calendar year to date).
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4713-content-data-sets#content-user-progress
 */
#[ORM\Entity(repositoryClass: ContentUserProgressRepository::class)]
#[ORM\Table(name: 'D2L_CONTENT_USER_PROGRESS')]
#[UniqueConstraint(name: 'D2L_CONTENT_USER_PROGRESS_PUK', columns: ['ContentObjectId', 'UserId'])]
final class ContentUserProgress
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
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * This column is currently not in use and appears as null.
     */
    #[ORM\Column(name: 'CompletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $completedDate = null;

    /**
     * Date content was last visited (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastVisited', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastVisited = null;

    /**
     * Is content read by user
     */
    #[ORM\Column(name: 'IsRead', nullable: true)]
    private ?bool $isRead = null;

    /**
     * Number of visits where the content is viewed, and the user continues in Brightspace. Recommend adding Real and
     * Fake visits for total visits by a user.
     */
    #[ORM\Column(name: 'NumRealVisits', precision: 10, nullable: true)]
    private ?int $numRealVisits = null;

    /**
     * Number of visits where the content is viewed and the user leaves by closing the browser/tab or the session times
     * out while the content is open.
     */
    #[ORM\Column(name: 'NumFakeVisits', precision: 10, nullable: true)]
    private ?int $numFakeVisits = null;

    /**
     * Total real visit time spent in content, in seconds
     */
    #[ORM\Column(name: 'TotalTime', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $totalTime = null;

    /**
     * Is content visited by user
     */
    #[ORM\Column(name: 'IsVisited', nullable: true)]
    private ?bool $isVisited = null;

    /**
     * Is content the last topic visited by user
     */
    #[ORM\Column(name: 'IsCurrentBookmark', nullable: true)]
    private ?bool $isCurrentBookmark = null;

    /**
     * Is self assessment topic completed
     */
    #[ORM\Column(name: 'IsSelfAssessComplete', nullable: true)]
    private ?bool $isSelfAssessComplete = null;

    /**
     * Indicates the last time the user progress record was changed.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCompletedDate(): ?\DateTimeImmutable
    {
        return $this->completedDate;
    }

    public function setCompletedDate(?\DateTimeImmutable $completedDate): static
    {
        $this->completedDate = $completedDate;

        return $this;
    }

    public function getLastVisited(): ?\DateTimeImmutable
    {
        return $this->lastVisited;
    }

    public function setLastVisited(?\DateTimeImmutable $lastVisited): static
    {
        $this->lastVisited = $lastVisited;

        return $this;
    }

    public function isRead(): ?bool
    {
        return $this->isRead;
    }

    public function setRead(?bool $isRead): static
    {
        $this->isRead = $isRead;

        return $this;
    }

    public function getNumRealVisits(): ?int
    {
        return $this->numRealVisits;
    }

    public function setNumRealVisits(?int $numRealVisits): static
    {
        $this->numRealVisits = $numRealVisits;

        return $this;
    }

    public function getNumFakeVisits(): ?int
    {
        return $this->numFakeVisits;
    }

    public function setNumFakeVisits(?int $numFakeVisits): static
    {
        $this->numFakeVisits = $numFakeVisits;

        return $this;
    }

    public function getTotalTime(): ?string
    {
        return $this->totalTime;
    }

    public function setTotalTime(?string $totalTime): static
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    public function isVisited(): ?bool
    {
        return $this->isVisited;
    }

    public function setVisited(?bool $isVisited): static
    {
        $this->isVisited = $isVisited;

        return $this;
    }

    public function isCurrentBookmark(): ?bool
    {
        return $this->isCurrentBookmark;
    }

    public function setCurrentBookmark(?bool $isCurrentBookmark): static
    {
        $this->isCurrentBookmark = $isCurrentBookmark;

        return $this;
    }

    public function isSelfAssessComplete(): ?bool
    {
        return $this->isSelfAssessComplete;
    }

    public function setSelfAssessComplete(?bool $isSelfAssessComplete): static
    {
        $this->isSelfAssessComplete = $isSelfAssessComplete;

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
}
