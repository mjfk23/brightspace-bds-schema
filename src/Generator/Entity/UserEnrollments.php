<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\UserEnrollmentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The User Enrollments Brightspace Data Set returns a list of enrollments for all users in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#user-enrollments
 */
#[ORM\Entity(repositoryClass: UserEnrollmentsRepository::class)]
#[ORM\Table(name: 'D2L_USER_ENROLLMENT')]
#[UniqueConstraint(name: 'D2L_USER_ENROLLMENT_PUK', columns: ['OrgUnitId', 'UserId'])]
final class UserEnrollments
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Role name
     */
    #[ORM\Column(name: 'RoleName', length: 120, nullable: true)]
    private ?string $roleName = null;

    /**
     * Date enrolled (UTC)
     */
    #[ORM\Column(name: 'EnrollmentDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $enrollmentDate = null;

    /**
     * Enrollment type. Field can be null.
     */
    #[ORM\Column(name: 'EnrollmentType', length: 100, nullable: true)]
    private ?string $enrollmentType = null;

    /**
     * Unique role identifier
     */
    #[ORM\Column(name: 'RoleId', precision: 10, nullable: true)]
    private ?int $roleId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    public function setRoleName(?string $roleName): static
    {
        $this->roleName = $roleName;

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

    public function getEnrollmentType(): ?string
    {
        return $this->enrollmentType;
    }

    public function setEnrollmentType(?string $enrollmentType): static
    {
        $this->enrollmentType = $enrollmentType;

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
}
