<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AudioVideoProcessedRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Audio Video Processed Brightspace Data Set, each row represents one completed media processing job. The data
 * set captures events from January 2022 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/22812-content-service-data-sets#audio-video-processed
 */
#[ORM\Entity(repositoryClass: AudioVideoProcessedRepository::class)]
#[ORM\Table(name: 'D2L_AUDIO_VIDEO_PROCESSED')]
#[UniqueConstraint(name: 'D2L_AUDIO_VIDEO_PROCESSED_PUK', columns: ['ContentId', 'RevisionId'])]
final class AudioVideoProcessed
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
     * Unique revision identifier.
     */
    #[ORM\Column(name: 'RevisionId', type: Types::GUID, nullable: false)]
    private ?string $revisionId = null;

    /**
     * Indicates the version of the media object that this processing job applies to. For example: for a video that's
     * been edited 4 times, the row representing the media processing job for version 3 will have "3" in this column.
     */
    #[ORM\Column(name: 'RevisionNumber', precision: 10, nullable: true)]
    private ?int $revisionNumber = null;

    /**
     * Type of content for this revision: Audio or Video.
     */
    #[ORM\Column(name: 'Type', length: 10, nullable: true)]
    private ?string $type = null;

    /**
     * Location in Brightspace from which the content was added. Field can be null.
     */
    #[ORM\Column(name: 'Source', length: 64, nullable: true)]
    private ?string $source = null;

    /**
     * Size of all resources for this revision in bytes.
     */
    #[ORM\Column(name: 'RevisionSize', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $revisionSize = null;

    /**
     * Duration of the revision in seconds.
     */
    #[ORM\Column(name: 'Duration', precision: 10, nullable: true)]
    private ?int $duration = null;

    /**
     * True if the revision required transcoding.
     */
    #[ORM\Column(name: 'RequiredTranscoding', nullable: true)]
    private ?bool $requiredTranscoding = null;

    /**
     * True if the revision required transcribing.
     */
    #[ORM\Column(name: 'RequiredTranscribing', nullable: true)]
    private ?bool $requiredTranscribing = null;

    /**
     * Date this revision was last modified (UTC).
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

    public function getRevisionId(): ?string
    {
        return $this->revisionId;
    }

    public function setRevisionId(string $revisionId): static
    {
        $this->revisionId = $revisionId;

        return $this;
    }

    public function getRevisionNumber(): ?int
    {
        return $this->revisionNumber;
    }

    public function setRevisionNumber(?int $revisionNumber): static
    {
        $this->revisionNumber = $revisionNumber;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getRevisionSize(): ?string
    {
        return $this->revisionSize;
    }

    public function setRevisionSize(?string $revisionSize): static
    {
        $this->revisionSize = $revisionSize;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function isRequiredTranscoding(): ?bool
    {
        return $this->requiredTranscoding;
    }

    public function setRequiredTranscoding(?bool $requiredTranscoding): static
    {
        $this->requiredTranscoding = $requiredTranscoding;

        return $this;
    }

    public function isRequiredTranscribing(): ?bool
    {
        return $this->requiredTranscribing;
    }

    public function setRequiredTranscribing(?bool $requiredTranscribing): static
    {
        $this->requiredTranscribing = $requiredTranscribing;

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
