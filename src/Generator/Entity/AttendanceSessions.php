<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AttendanceSessionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Attendance Sessions Brightspace Data Set maps the sessions that exist for each register in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4519-attendance-data-sets#attendance-sessions
 */
#[ORM\Entity(repositoryClass: AttendanceSessionsRepository::class)]
#[ORM\Table(name: 'D2L_ATTENDANCE_SESSION')]
#[UniqueConstraint(name: 'D2L_ATTENDANCE_SESSION_PUK', columns: ['AttendanceSessionId'])]
final class AttendanceSessions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the session.
     */
    #[ORM\Column(name: 'AttendanceSessionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $attendanceSessionId = null;

    /**
     * Unique attendance register identifier.
     */
    #[ORM\Column(name: 'AttendanceRegisterId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $attendanceRegisterId = null;

    /**
     * The given name of the session.
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * The description of the session. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 512, nullable: true)]
    private ?string $description = null;

    /**
     * The placement of the session in the register. Field can be null.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Date the session was deleted (UTC). Field can be null.
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

    public function getAttendanceSessionId(): ?string
    {
        return $this->attendanceSessionId;
    }

    public function setAttendanceSessionId(string $attendanceSessionId): static
    {
        $this->attendanceSessionId = $attendanceSessionId;

        return $this;
    }

    public function getAttendanceRegisterId(): ?string
    {
        return $this->attendanceRegisterId;
    }

    public function setAttendanceRegisterId(?string $attendanceRegisterId): static
    {
        $this->attendanceRegisterId = $attendanceRegisterId;

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

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

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
