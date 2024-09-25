<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ActivityFeedCommentLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Activity Feed Comment Log Brightspace Data Set returns details on all actions that occur to each comment in the
 * organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4712-activity-feed-data-sets#activity-feed-comment-log
 */
#[ORM\Entity(repositoryClass: ActivityFeedCommentLogRepository::class)]
#[ORM\Table(name: 'D2L_ACTIVITY_FEED_COMMENT_LOG')]
#[UniqueConstraint(name: 'D2L_ACTIVITY_FEED_COMMENT_LOG_PUK', columns: ['LogId'])]
final class ActivityFeedCommentLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique log entry identifier.
     */
    #[ORM\Column(name: 'LogId', type: Types::GUID, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique identifier of the user who last modified the comment.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique organization unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique comment identifier.
     */
    #[ORM\Column(name: 'CommentId', type: Types::GUID, nullable: true)]
    private ?string $commentId = null;

    /**
     * Indicates whether the comment was created, updated, or deleted.
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

    /**
     * Date the comment was created, updated, or deleted (UTC).
     */
    #[ORM\Column(name: 'ActionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $actionDate = null;

    /**
     * Text of the comment.
     */
    #[ORM\Column(name: 'Content', length: 4000, nullable: true)]
    private ?string $content = null;

    /**
     * Unique identifier for the parent post.
     */
    #[ORM\Column(name: 'PostId', type: Types::GUID, nullable: true)]
    private ?string $postId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLogId(): ?string
    {
        return $this->logId;
    }

    public function setLogId(string $logId): static
    {
        $this->logId = $logId;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getCommentId(): ?string
    {
        return $this->commentId;
    }

    public function setCommentId(?string $commentId): static
    {
        $this->commentId = $commentId;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getActionDate(): ?\DateTimeImmutable
    {
        return $this->actionDate;
    }

    public function setActionDate(?\DateTimeImmutable $actionDate): static
    {
        $this->actionDate = $actionDate;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(?string $postId): static
    {
        $this->postId = $postId;

        return $this;
    }
}
