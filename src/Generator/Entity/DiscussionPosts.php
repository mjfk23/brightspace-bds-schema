<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\DiscussionPostsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Discussion Posts Brightspace Data Set returns details on discussion posts, ordered from newest to oldest. The
 * Discussion Posts Brightspace Data Set contains data from 1 January 2021 onwards and adheres to the default system
 * limit of 150 million rows of the most recent data. Note: You can extract the body of the discussion post through the
 * API.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4525-discussions-data-sets#discussion-posts
 */
#[ORM\Entity(repositoryClass: DiscussionPostsRepository::class)]
#[ORM\Table(name: 'D2L_DISCUSSION_POST')]
#[UniqueConstraint(name: 'D2L_DISCUSSION_POST_PUK', columns: ['PostId'])]
final class DiscussionPosts
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique topic identifier
     */
    #[ORM\Column(name: 'TopicId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $topicId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique post identifier
     */
    #[ORM\Column(name: 'PostId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $postId = null;

    /**
     * Unique thread identifier
     */
    #[ORM\Column(name: 'ThreadId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $threadId = null;

    /**
     * If post is a reply
     */
    #[ORM\Column(name: 'IsReply', nullable: true)]
    private ?bool $isReply = null;

    /**
     * Parent post Id. Field can be null.
     */
    #[ORM\Column(name: 'ParentPostId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $parentPostId = null;

    /**
     * Number of replies to a post
     */
    #[ORM\Column(name: 'NumReplies', precision: 10, nullable: true)]
    private ?int $numReplies = null;

    /**
     * Date the post was made (UTC).
     */
    #[ORM\Column(name: 'DatePosted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $datePosted = null;

    /**
     * Is post deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Sum of all ratings for a post
     */
    #[ORM\Column(name: 'RatingSum', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $ratingSum = null;

    /**
     * Number of ratings for a post
     */
    #[ORM\Column(name: 'NumRatings', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $numRatings = null;

    /**
     * Users score on the post (if graded). Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Indicates the date when the discussion post was edited (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastEditDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastEditDate = null;

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
     * Discussion thread name. Field can be null.
     */
    #[ORM\Column(name: 'Thread', length: 800, nullable: true)]
    private ?string $thread = null;

    /**
     * Indicates the number of words counted in the discussion post. Field can be null.
     */
    #[ORM\Column(name: 'WordCount', precision: 10, nullable: true)]
    private ?int $wordCount = null;

    /**
     * Indicates the number of attachments associated with a discussion post. Field can be null.
     */
    #[ORM\Column(name: 'AttachmentCount', precision: 10, nullable: true)]
    private ?int $attachmentCount = null;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
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

    public function setUserId(?int $userId): static
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

    public function getThreadId(): ?string
    {
        return $this->threadId;
    }

    public function setThreadId(?string $threadId): static
    {
        $this->threadId = $threadId;

        return $this;
    }

    public function isReply(): ?bool
    {
        return $this->isReply;
    }

    public function setReply(?bool $isReply): static
    {
        $this->isReply = $isReply;

        return $this;
    }

    public function getParentPostId(): ?string
    {
        return $this->parentPostId;
    }

    public function setParentPostId(?string $parentPostId): static
    {
        $this->parentPostId = $parentPostId;

        return $this;
    }

    public function getNumReplies(): ?int
    {
        return $this->numReplies;
    }

    public function setNumReplies(?int $numReplies): static
    {
        $this->numReplies = $numReplies;

        return $this;
    }

    public function getDatePosted(): ?\DateTimeImmutable
    {
        return $this->datePosted;
    }

    public function setDatePosted(?\DateTimeImmutable $datePosted): static
    {
        $this->datePosted = $datePosted;

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

    public function getRatingSum(): ?string
    {
        return $this->ratingSum;
    }

    public function setRatingSum(?string $ratingSum): static
    {
        $this->ratingSum = $ratingSum;

        return $this;
    }

    public function getNumRatings(): ?string
    {
        return $this->numRatings;
    }

    public function setNumRatings(?string $numRatings): static
    {
        $this->numRatings = $numRatings;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getLastEditDate(): ?\DateTimeImmutable
    {
        return $this->lastEditDate;
    }

    public function setLastEditDate(?\DateTimeImmutable $lastEditDate): static
    {
        $this->lastEditDate = $lastEditDate;

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

    public function getThread(): ?string
    {
        return $this->thread;
    }

    public function setThread(?string $thread): static
    {
        $this->thread = $thread;

        return $this;
    }

    public function getWordCount(): ?int
    {
        return $this->wordCount;
    }

    public function setWordCount(?int $wordCount): static
    {
        $this->wordCount = $wordCount;

        return $this;
    }

    public function getAttachmentCount(): ?int
    {
        return $this->attachmentCount;
    }

    public function setAttachmentCount(?int $attachmentCount): static
    {
        $this->attachmentCount = $attachmentCount;

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
