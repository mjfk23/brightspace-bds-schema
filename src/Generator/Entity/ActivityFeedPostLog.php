<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ActivityFeedPostLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Activity Feed Post Log Brightspace Data Set returns details on all actions that occur to each post in the
 * organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4712-activity-feed-data-sets#activity-feed-post-log
 */
#[ORM\Entity(repositoryClass: ActivityFeedPostLogRepository::class)]
#[ORM\Table(name: 'D2L_ACTIVITY_FEED_POST_LOG')]
#[UniqueConstraint(name: 'D2L_ACTIVITY_FEED_POST_LOG_PUK', columns: ['LogId'])]
final class ActivityFeedPostLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique log entry identifier
     */
    #[ORM\Column(name: 'LogId', type: Types::GUID, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique identifier of the user who last modified the post.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique post identifier.
     */
    #[ORM\Column(name: 'PostId', type: Types::GUID, nullable: true)]
    private ?string $postId = null;

    /**
     * Type of post.
     */
    #[ORM\Column(name: 'PostType', length: 32, nullable: true)]
    private ?string $postType = null;

    /**
     * Indicates whether the post was created, updated, or deleted.
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

    /**
     * Date the post was created, updated, or deleted (UTC).
     */
    #[ORM\Column(name: 'ActionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $actionDate = null;

    /**
     * Unique ID of the posted assignment, if the post is of type assignment. Field can be null.
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $dropboxId = null;

    /**
     * The text of the message post, if the post is of type message. Field can be null.
     */
    #[ORM\Column(name: 'Content', length: 4000, nullable: true)]
    private ?string $content = null;

    /**
     * Number of comments associated with the post.
     */
    #[ORM\Column(name: 'CommentCount', precision: 10, nullable: true)]
    private ?int $commentCount = null;

    /**
     * Indicates the number of attachments associated with the post, if the post is of type message. Field can be null.
     */
    #[ORM\Column(name: 'AttachmentCount', precision: 10, nullable: true)]
    private ?int $attachmentCount = null;

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

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(?string $postId): static
    {
        $this->postId = $postId;

        return $this;
    }

    public function getPostType(): ?string
    {
        return $this->postType;
    }

    public function setPostType(?string $postType): static
    {
        $this->postType = $postType;

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

    public function getDropboxId(): ?string
    {
        return $this->dropboxId;
    }

    public function setDropboxId(?string $dropboxId): static
    {
        $this->dropboxId = $dropboxId;

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

    public function getCommentCount(): ?int
    {
        return $this->commentCount;
    }

    public function setCommentCount(?int $commentCount): static
    {
        $this->commentCount = $commentCount;

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
}
