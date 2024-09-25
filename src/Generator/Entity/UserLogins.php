<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\UserLoginsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The User Logins Brightspace Data Set returns a list of all login attempts for your organization. The User Logins
 * Brightspace Data Set contains data from 1 January 2021 onwards and adheres to the default system limit of 150 million
 * rows of the most recent data.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#user-logins
 */
#[ORM\Entity(repositoryClass: UserLoginsRepository::class)]
#[ORM\Table(name: 'D2L_USER_LOGIN')]
#[UniqueConstraint(name: 'D2L_USER_LOGIN_PUK', columns: ['LoginAttemptId'])]
final class UserLogins
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * User name used to attempt log in.
     */
    #[ORM\Column(name: 'UserName', length: 512, nullable: true)]
    private ?string $userName = null;

    /**
     * IP address
     */
    #[ORM\Column(name: 'IP', length: 128, nullable: true)]
    private ?string $iP = null;

    /**
     * Unique session identifier. Field can be null.
     */
    #[ORM\Column(name: 'SessionId', precision: 10, nullable: true)]
    private ?int $sessionId = null;

    /**
     * Login status
     */
    #[ORM\Column(name: 'StatusType', length: 100, nullable: true)]
    private ?string $statusType = null;

    /**
     * Attempt date (UTC)
     */
    #[ORM\Column(name: 'AttemptDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $attemptDate = null;

    /**
     * User ID of impersonator. Field can be null.
     */
    #[ORM\Column(name: 'ImpersonatingUserId', precision: 10, nullable: true)]
    private ?int $impersonatingUserId = null;

    /**
     * Unique login attempt identifier
     */
    #[ORM\Column(name: 'LoginAttemptId', length: 72, nullable: false)]
    private ?string $loginAttemptId = null;

    /**
     * The source of the login attempt, for example: Brightspace.
     */
    #[ORM\Column(name: 'LoginSource', length: 100, nullable: true)]
    private ?string $loginSource = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }

    public function getIP(): ?string
    {
        return $this->iP;
    }

    public function setIP(?string $iP): static
    {
        $this->iP = $iP;

        return $this;
    }

    public function getSessionId(): ?int
    {
        return $this->sessionId;
    }

    public function setSessionId(?int $sessionId): static
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getStatusType(): ?string
    {
        return $this->statusType;
    }

    public function setStatusType(?string $statusType): static
    {
        $this->statusType = $statusType;

        return $this;
    }

    public function getAttemptDate(): ?\DateTimeImmutable
    {
        return $this->attemptDate;
    }

    public function setAttemptDate(?\DateTimeImmutable $attemptDate): static
    {
        $this->attemptDate = $attemptDate;

        return $this;
    }

    public function getImpersonatingUserId(): ?int
    {
        return $this->impersonatingUserId;
    }

    public function setImpersonatingUserId(?int $impersonatingUserId): static
    {
        $this->impersonatingUserId = $impersonatingUserId;

        return $this;
    }

    public function getLoginAttemptId(): ?string
    {
        return $this->loginAttemptId;
    }

    public function setLoginAttemptId(string $loginAttemptId): static
    {
        $this->loginAttemptId = $loginAttemptId;

        return $this;
    }

    public function getLoginSource(): ?string
    {
        return $this->loginSource;
    }

    public function setLoginSource(?string $loginSource): static
    {
        $this->loginSource = $loginSource;

        return $this;
    }
}
