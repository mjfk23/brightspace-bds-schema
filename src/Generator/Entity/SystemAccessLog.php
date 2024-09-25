<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SystemAccessLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The System Access Log Brightspace Data Set captures each time a user accesses the system from the LMS via a browser
 * (Brightspace), from the Pulse app (Pulse), or from the Brightspace Parent & Guardian mobile app (BPG-mobile). System
 * access using Brightspace Parent & Guardian is represented in the data set twice: one where Source=Brightspace and one
 * where Source=BPG-mobile. System access begins when the user logs in, returns after 30 minutes of inactivity, or opens
 * the app. System access ends after 30 minutes of inactivity. Data from Brightspace and Pulse is available from
 * September 2020 onwards. Data from Brightspace Parent & Guardian is only available from May 2022 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4537-sessions-and-system-access-data-sets#system-access-log
 */
#[ORM\Entity(repositoryClass: SystemAccessLogRepository::class)]
#[ORM\Table(name: 'D2L_SYSTEM_ACCESS_LOG')]
#[UniqueConstraint(name: 'D2L_SYSTEM_ACCESS_LOG_PUK', columns: ['SessionId', 'UserId', 'Timestamp', 'State'])]
final class SystemAccessLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the session.
     */
    #[ORM\Column(name: 'SessionId', length: 72, nullable: false)]
    private ?string $sessionId = null;

    /**
     * Unique identifier for the user.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Date and time in which the system access changed state.
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $timestamp = null;

    /**
     * Indicates whether a system access started or ended at the reported time.
     */
    #[ORM\Column(name: 'State', length: 40, nullable: false)]
    private ?string $state = null;

    /**
     * Source of the system access. Possible values:
     */
    #[ORM\Column(name: 'Source', length: 40, nullable: true)]
    private ?string $source = null;

    /**
     * Version of the app, where applicable. Field will be null for Brightspace sources.
     */
    #[ORM\Column(name: 'AppVersion', length: 40, nullable: true)]
    private ?string $appVersion = null;

    /**
     * Device used in the system access. Field will be null for Brightspace sources.
     */
    #[ORM\Column(name: 'Device', length: 100, nullable: true)]
    private ?string $device = null;

    /**
     * Indicates if a portion or all of the system access occurred offline with no internet connection. Field will be
     * null for Brightspace sources.
     */
    #[ORM\Column(name: 'IsOfflineMode', nullable: true)]
    private ?bool $isOfflineMode = null;

    /**
     * IP Address at which the event occurred. Field can be null.
     */
    #[ORM\Column(name: 'IPAddress', length: 90, nullable: true)]
    private ?string $iPAddress = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): static
    {
        $this->sessionId = $sessionId;

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

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

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

    public function getAppVersion(): ?string
    {
        return $this->appVersion;
    }

    public function setAppVersion(?string $appVersion): static
    {
        $this->appVersion = $appVersion;

        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(?string $device): static
    {
        $this->device = $device;

        return $this;
    }

    public function isOfflineMode(): ?bool
    {
        return $this->isOfflineMode;
    }

    public function setOfflineMode(?bool $isOfflineMode): static
    {
        $this->isOfflineMode = $isOfflineMode;

        return $this;
    }

    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    public function setIPAddress(?string $iPAddress): static
    {
        $this->iPAddress = $iPAddress;

        return $this;
    }
}
