<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SessionHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Session History Brightspace Data Set returns a list of login session histories for all users in your
 * organization. Does not include app usage. The Session History Brightspace Data Set contains data from 1 January 2021
 * onwards and adheres to the default system limit of 150 million rows of the most recent data.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4537-sessions-and-system-access-data-sets#session-history
 */
#[ORM\Entity(repositoryClass: SessionHistoryRepository::class)]
#[ORM\Table(name: 'D2L_SESSION_HISTORY')]
#[UniqueConstraint(name: 'D2L_SESSION_HISTORY_PUK', columns: ['HistoryID'])]
final class SessionHistory
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique session identifier. Field can be null.
     */
    #[ORM\Column(name: 'SessionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $sessionId = null;

    /**
     * Unique org unit Identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgId', precision: 10, nullable: true)]
    private ?int $orgId = null;

    /**
     * Unique user identifier. Field can be null.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Session start date time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateStarted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateStarted = null;

    /**
     * Session end date time (UTC).
     */
    #[ORM\Column(name: 'DateEnded', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateEnded = null;

    /**
     * Last access date time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastAccessed', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastAccessed = null;

    /**
     * If session timed out.
     */
    #[ORM\Column(name: 'TimedOut', nullable: true)]
    private ?bool $timedOut = null;

    /**
     * Unique session history identifier.
     */
    #[ORM\Column(name: 'HistoryID', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $historyID = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): static
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getOrgId(): ?int
    {
        return $this->orgId;
    }

    public function setOrgId(?int $orgId): static
    {
        $this->orgId = $orgId;

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

    public function getDateStarted(): ?\DateTimeImmutable
    {
        return $this->dateStarted;
    }

    public function setDateStarted(?\DateTimeImmutable $dateStarted): static
    {
        $this->dateStarted = $dateStarted;

        return $this;
    }

    public function getDateEnded(): ?\DateTimeImmutable
    {
        return $this->dateEnded;
    }

    public function setDateEnded(?\DateTimeImmutable $dateEnded): static
    {
        $this->dateEnded = $dateEnded;

        return $this;
    }

    public function getLastAccessed(): ?\DateTimeImmutable
    {
        return $this->lastAccessed;
    }

    public function setLastAccessed(?\DateTimeImmutable $lastAccessed): static
    {
        $this->lastAccessed = $lastAccessed;

        return $this;
    }

    public function isTimedOut(): ?bool
    {
        return $this->timedOut;
    }

    public function setTimedOut(?bool $timedOut): static
    {
        $this->timedOut = $timedOut;

        return $this;
    }

    public function getHistoryID(): ?string
    {
        return $this->historyID;
    }

    public function setHistoryID(string $historyID): static
    {
        $this->historyID = $historyID;

        return $this;
    }
}
