<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\DiscussionPostsReadStatusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Discussion Posts Read Status Brightspace Data Set returns details on discussion posts read by users for your org
 * units. The Discussion Posts Read Status Brightspace Data Set contains data from 1 January 2021 onwards and adheres to
 * the default system limit of 150 million rows of the most recent data.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4525-discussions-data-sets#discussion-posts-read-status
 */
#[ORM\Entity(repositoryClass: DiscussionPostsReadStatusRepository::class)]
#[ORM\Table(name: 'D2L_DISCUSSION_POST_READ_STATUS')]
#[UniqueConstraint(name: 'D2L_DISCUSSION_POST_READ_STATUS_PUK', columns: ['UserId', 'PostId'])]
final class DiscussionPostsReadStatus
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique topic identifier
     */
    #[ORM\Column(name: 'TopicId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $topicId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique post identifier
     */
    #[ORM\Column(name: 'PostId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $postId = null;

    /**
     * If post has been read
     */
    #[ORM\Column(name: 'IsRead', nullable: true)]
    private ?bool $isRead = null;

    /**
     * First time the post was read (UTC). Field can be null.
     */
    #[ORM\Column(name: 'FirstReadDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $firstReadDate = null;

    /**
     * Latest date when post was read (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastReadDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastReadDate = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getTopicId(): ?string
    {
        return $this->topicId;
    }

    public function setTopicId(?string $topicId): static
    {
        $this->topicId = $topicId;

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

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(string $postId): static
    {
        $this->postId = $postId;

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

    public function getFirstReadDate(): ?\DateTimeImmutable
    {
        return $this->firstReadDate;
    }

    public function setFirstReadDate(?\DateTimeImmutable $firstReadDate): static
    {
        $this->firstReadDate = $firstReadDate;

        return $this;
    }

    public function getLastReadDate(): ?\DateTimeImmutable
    {
        return $this->lastReadDate;
    }

    public function setLastReadDate(?\DateTimeImmutable $lastReadDate): static
    {
        $this->lastReadDate = $lastReadDate;

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
