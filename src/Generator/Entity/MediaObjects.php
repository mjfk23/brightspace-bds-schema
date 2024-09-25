<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\MediaObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Media Objects Brightspace Data Set, each row represents one audio or video content object uploaded to Media
 * Library. The data set captures media objects from January 2022 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/22812-content-service-data-sets#media-objects
 */
#[ORM\Entity(repositoryClass: MediaObjectsRepository::class)]
#[ORM\Table(name: 'D2L_MEDIA_OBJECT')]
#[UniqueConstraint(name: 'D2L_MEDIA_OBJECT_PUK', columns: ['ContentId'])]
final class MediaObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique content identifier.
     */
    #[ORM\Column(name: 'ContentId', type: Types::GUID, nullable: false)]
    private ?string $contentId = null;

    /**
     * Title of the media object.
     */
    #[ORM\Column(name: 'Title', length: 2000, nullable: true)]
    private ?string $title = null;

    /**
     * Number of revisions of this media object.
     */
    #[ORM\Column(name: 'RevisionCount', precision: 10, nullable: true)]
    private ?int $revisionCount = null;

    /**
     * Brightspace user identifier for the owner of the media object.
     */
    #[ORM\Column(name: 'OwnerId', precision: 10, nullable: true)]
    private ?int $ownerId = null;

    /**
     * Date the media object was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getContentId(): ?string
    {
        return $this->contentId;
    }

    public function setContentId(string $contentId): static
    {
        $this->contentId = $contentId;

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

    public function getRevisionCount(): ?int
    {
        return $this->revisionCount;
    }

    public function setRevisionCount(?int $revisionCount): static
    {
        $this->revisionCount = $revisionCount;

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    public function setOwnerId(?int $ownerId): static
    {
        $this->ownerId = $ownerId;

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
