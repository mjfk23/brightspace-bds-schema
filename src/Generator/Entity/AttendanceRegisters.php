<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AttendanceRegistersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Attendance Registers Brightspace Data Set describes the registers for taking attendance that exist in your
 * organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4519-attendance-data-sets#attendance-registers
 */
#[ORM\Entity(repositoryClass: AttendanceRegistersRepository::class)]
#[ORM\Table(name: 'D2L_ATTENDANCE_REGISTER')]
#[UniqueConstraint(name: 'D2L_ATTENDANCE_REGISTER_PUK', columns: ['AttendanceRegisterId'])]
final class AttendanceRegisters
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique attendance register identifier.
     */
    #[ORM\Column(name: 'AttendanceRegisterId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $attendanceRegisterId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The name given to the register.
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * The description of the attendance register. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Unique identifier of the scheme used for the register.
     */
    #[ORM\Column(name: 'SchemeId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $schemeId = null;

    /**
     * Indicates if users are allowed to view this register.
     */
    #[ORM\Column(name: 'IsVisible', nullable: true)]
    private ?bool $isVisible = null;

    /**
     * Indicates that all users in the course can be assessed with this register. If false, only specific
     * groups/sections are included.
     */
    #[ORM\Column(name: 'IncludeAllUsers', nullable: true)]
    private ?bool $includeAllUsers = null;

    /**
     * The threshold at which users will be flagged as a concern. Field can be null.
     */
    #[ORM\Column(name: 'CauseForConcern', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $causeForConcern = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Deleted date of the attendance register (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * Unique identifier of the user who performed the delete action. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAttendanceRegisterId(): ?string
    {
        return $this->attendanceRegisterId;
    }

    public function setAttendanceRegisterId(string $attendanceRegisterId): static
    {
        $this->attendanceRegisterId = $attendanceRegisterId;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSchemeId(): ?string
    {
        return $this->schemeId;
    }

    public function setSchemeId(?string $schemeId): static
    {
        $this->schemeId = $schemeId;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setVisible(?bool $isVisible): static
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function isIncludeAllUsers(): ?bool
    {
        return $this->includeAllUsers;
    }

    public function setIncludeAllUsers(?bool $includeAllUsers): static
    {
        $this->includeAllUsers = $includeAllUsers;

        return $this;
    }

    public function getCauseForConcern(): ?string
    {
        return $this->causeForConcern;
    }

    public function setCauseForConcern(?string $causeForConcern): static
    {
        $this->causeForConcern = $causeForConcern;

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

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getDeletedBy(): ?int
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?int $deletedBy): static
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }
}
