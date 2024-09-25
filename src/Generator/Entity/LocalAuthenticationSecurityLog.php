<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LocalAuthenticationSecurityLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Local Authentication Security Log Brightspace Data Set has a record of users who are authorized for local login
 * and whether two-factor authentication was enabled or disabled. This data set only captures data from May 2022
 * onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4714-local-authentication-data-sets#local-authentication-security-log
 */
#[ORM\Entity(repositoryClass: LocalAuthenticationSecurityLogRepository::class)]
#[ORM\Table(name: 'D2L_LOCAL_AUTHENTICATION_SECURITY_LOG')]
#[UniqueConstraint(name: 'D2L_LOCAL_AUTHENTICATION_SECURITY_LOG_PUK', columns: ['UserId', 'Action', 'ModifiedBy', 'ModifiedDate'])]
final class LocalAuthenticationSecurityLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the user.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * The action performed for the user. Possible values:
     */
    #[ORM\Column(name: 'Action', length: 140, nullable: false)]
    private ?string $action = null;

    /**
     * UserId of the user who performed the action.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: false)]
    private ?int $modifiedBy = null;

    /**
     * Date and time when the action was performed (UTC).
     */
    #[ORM\Column(name: 'ModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $modifiedDate = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getModifiedDate(): ?\DateTimeImmutable
    {
        return $this->modifiedDate;
    }

    public function setModifiedDate(\DateTimeImmutable $modifiedDate): static
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }
}
