<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\MediaConsumptionLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Media Consumption Log Brightspace Data Set, each row represents one session where a user interacted with a
 * media object, beginning when the user starts playback and ending when the user stops engaging with the media object.
 * The data set captures events from November 2023 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/22812-content-service-data-sets#media-consumption-log
 */
#[ORM\Entity(repositoryClass: MediaConsumptionLogRepository::class)]
#[ORM\Table(name: 'D2L_MEDIA_CONSUMPTION_LOG')]
#[UniqueConstraint(name: 'D2L_MEDIA_CONSUMPTION_LOG_PUK', columns: ['LogId'])]
final class MediaConsumptionLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for this consumption session.
     */
    #[ORM\Column(name: 'LogId', type: Types::GUID, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique identifier for the user who consumed the content.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique identifier for the content that was consumed.
     */
    #[ORM\Column(name: 'ContentId', type: Types::GUID, nullable: true)]
    private ?string $contentId = null;

    /**
     * Unique identifier for the revision of the content that was consumed.
     */
    #[ORM\Column(name: 'RevisionId', type: Types::GUID, nullable: true)]
    private ?string $revisionId = null;

    /**
     * Type of content for this revision: Audio or Video.
     */
    #[ORM\Column(name: 'ContentType', length: 10, nullable: true)]
    private ?string $contentType = null;

    /**
     * Location in Brightspace from which the content was added. Field can be null.
     */
    #[ORM\Column(name: 'ClientApp', length: 64, nullable: true)]
    private ?string $clientApp = null;

    /**
     * Date and time when the user started this consumption session (UTC).
     */
    #[ORM\Column(name: 'DateConsumed', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateConsumed = null;

    /**
     * Percentage (from 0 to 100) of the content's duration that the user consumed in this session.
     */
    #[ORM\Column(name: 'DurationPercentageWatched', precision: 10, nullable: true)]
    private ?int $durationPercentageWatched = null;

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

    public function getContentId(): ?string
    {
        return $this->contentId;
    }

    public function setContentId(?string $contentId): static
    {
        $this->contentId = $contentId;

        return $this;
    }

    public function getRevisionId(): ?string
    {
        return $this->revisionId;
    }

    public function setRevisionId(?string $revisionId): static
    {
        $this->revisionId = $revisionId;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): static
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getClientApp(): ?string
    {
        return $this->clientApp;
    }

    public function setClientApp(?string $clientApp): static
    {
        $this->clientApp = $clientApp;

        return $this;
    }

    public function getDateConsumed(): ?\DateTimeImmutable
    {
        return $this->dateConsumed;
    }

    public function setDateConsumed(?\DateTimeImmutable $dateConsumed): static
    {
        $this->dateConsumed = $dateConsumed;

        return $this;
    }

    public function getDurationPercentageWatched(): ?int
    {
        return $this->durationPercentageWatched;
    }

    public function setDurationPercentageWatched(?int $durationPercentageWatched): static
    {
        $this->durationPercentageWatched = $durationPercentageWatched;

        return $this;
    }
}
