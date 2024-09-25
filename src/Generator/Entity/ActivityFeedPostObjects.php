<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ActivityFeedPostObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Activity Feed Post Objects Brightspace Data Set returns details on each post in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4712-activity-feed-data-sets#activity-feed-post-objects
 */
#[ORM\Entity(repositoryClass: ActivityFeedPostObjectsRepository::class)]
#[ORM\Table(name: 'D2L_ACTIVITY_FEED_POST_OBJECT')]
#[UniqueConstraint(name: 'D2L_ACTIVITY_FEED_POST_OBJECT_PUK', columns: ['PostId'])]
final class ActivityFeedPostObjects
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
     * Unique post identifier.
     */
    #[ORM\Column(name: 'PostId', type: Types::GUID, nullable: false)]
    private ?string $postId = null;

    /**
     * The type of post.
     */
    #[ORM\Column(name: 'PostType', length: 32, nullable: true)]
    private ?string $postType = null;

    /**
     * Unique identifier of the user who last modified the post.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Date the post was created, updated, or deleted (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Unique identifier of the posted assignment, if the post is of type assignment. Field can be null.
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $dropboxId = null;

    /**
     * The text of the message post, if the post is of type message. Field can be null.
     */
    #[ORM\Column(name: 'Content', length: 4000, nullable: true)]
    private ?string $content = null;

    /**
     * Indicates if the post has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the number of comments associated with the post.
     */
    #[ORM\Column(name: 'CommentCount', precision: 10, nullable: true)]
    private ?int $commentCount = null;

    /**
     * Indicates the number of attachments associated with the post, if the post is of type message. Field can be null.
     */
    #[ORM\Column(name: 'AttachmentCount', precision: 10, nullable: true)]
    private ?int $attachmentCount = null;

    /**
     * Version of post.
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

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(string $postId): static
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

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

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
