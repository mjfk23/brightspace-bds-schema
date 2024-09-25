<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AttendanceUserSessionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Attendance User Sessions Brightspace Data Set provides the result for each user's session in each register in
 * your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4519-attendance-data-sets#attendance-user-sessions
 */
#[ORM\Entity(repositoryClass: AttendanceUserSessionsRepository::class)]
#[ORM\Table(name: 'D2L_ATTENDANCE_USER_SESSION')]
#[UniqueConstraint(name: 'D2L_ATTENDANCE_USER_SESSION_PUK', columns: ['UserId', 'AttendanceSessionId'])]
final class AttendanceUserSessions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique identifier for the session.
     */
    #[ORM\Column(name: 'AttendanceSessionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $attendanceSessionId = null;

    /**
     * Unique scheme symbol identifier given to the user for the session.
     */
    #[ORM\Column(name: 'SchemeSymbolId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $schemeSymbolId = null;

    /**
     * Date the symbol for the user in the session was last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Unique identifier for the user who last modified the session. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if the user session has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

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

    public function getAttendanceSessionId(): ?string
    {
        return $this->attendanceSessionId;
    }

    public function setAttendanceSessionId(string $attendanceSessionId): static
    {
        $this->attendanceSessionId = $attendanceSessionId;

        return $this;
    }

    public function getSchemeSymbolId(): ?string
    {
        return $this->schemeSymbolId;
    }

    public function setSchemeSymbolId(?string $schemeSymbolId): static
    {
        $this->schemeSymbolId = $schemeSymbolId;

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

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

        return $this;
    }

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

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
}
