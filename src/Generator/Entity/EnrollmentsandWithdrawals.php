<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\EnrollmentsandWithdrawalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Enrollments and Withdrawals Brightspace Data Set returns a list of enrollments and withdrawals for all users in
 * your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#enrollments-and-withdrawals
 */
#[ORM\Entity(repositoryClass: EnrollmentsandWithdrawalsRepository::class)]
#[ORM\Table(name: 'D2L_ENROLLMENTS_WITHDRAWAL')]
#[UniqueConstraint(name: 'D2L_ENROLLMENTS_WITHDRAWAL_PUK', columns: ['LogId'])]
final class EnrollmentsandWithdrawals
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique log entry identifier for any change to the user enrollment.
     */
    #[ORM\Column(name: 'LogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique role identifier. Field can be null.
     */
    #[ORM\Column(name: 'RoleId', precision: 10, nullable: true)]
    private ?int $roleId = null;

    /**
     * Indicates whether the item is an enrollment or a withdrawal
     */
    #[ORM\Column(name: 'Action', length: 100, nullable: true)]
    private ?string $action = null;

    /**
     * Identifies the last user who modified the enrollment status for the user. Field can be null.
     */
    #[ORM\Column(name: 'ModifiedByUserId', precision: 10, nullable: true)]
    private ?int $modifiedByUserId = null;

    /**
     * Date enrolled (UTC)
     */
    #[ORM\Column(name: 'EnrollmentDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $enrollmentDate = null;

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

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function setRoleId(?int $roleId): static
    {
        $this->roleId = $roleId;

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

    public function getModifiedByUserId(): ?int
    {
        return $this->modifiedByUserId;
    }

    public function setModifiedByUserId(?int $modifiedByUserId): static
    {
        $this->modifiedByUserId = $modifiedByUserId;

        return $this;
    }

    public function getEnrollmentDate(): ?\DateTimeImmutable
    {
        return $this->enrollmentDate;
    }

    public function setEnrollmentDate(?\DateTimeImmutable $enrollmentDate): static
    {
        $this->enrollmentDate = $enrollmentDate;

        return $this;
    }
}
