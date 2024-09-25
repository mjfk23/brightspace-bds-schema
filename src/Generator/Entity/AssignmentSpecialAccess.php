<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AssignmentSpecialAccessRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Assignment Special Access Brightspace Data Set returns all applicable special access start, end, and due dates
 * for each assignment in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4767-assignments-data-sets#assignment-special-access
 */
#[ORM\Entity(repositoryClass: AssignmentSpecialAccessRepository::class)]
#[ORM\Table(name: 'D2L_ASSIGNMENT_SPECIAL_ACCESS')]
#[UniqueConstraint(name: 'D2L_ASSIGNMENT_SPECIAL_ACCESS_PUK', columns: ['DropboxId', 'UserId'])]
final class AssignmentSpecialAccess
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique assignment identifier
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $dropboxId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Assignment special access availability start date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Assignment special access availability end date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Assignment special access due date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DueDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dueDate = null;

    /**
     * User who modified the assignment special access.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

    /**
     * Date when the special access was last modified for the assignment (UTC)
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Indicates if special access has been deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Determines whether learners can view or access the assignment before the StartDate. See About Availability Type
     * for details. No data available for assignments created before December 2022/20.22.12. Field can be null.
     */
    #[ORM\Column(name: 'StartDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $startDateAvailabilityType = null;

    /**
     * Determines whether learners can view or access the assignment after the EndDate. See About Availability Type for
     * details. No data available for assignments created before December 2022/20.22.12. Field can be null.
     */
    #[ORM\Column(name: 'EndDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $endDateAvailabilityType = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getDropboxId(): ?string
    {
        return $this->dropboxId;
    }

    public function setDropboxId(string $dropboxId): static
    {
        $this->dropboxId = $dropboxId;

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

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeImmutable $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getStartDateAvailabilityType(): ?int
    {
        return $this->startDateAvailabilityType;
    }

    public function setStartDateAvailabilityType(?int $startDateAvailabilityType): static
    {
        $this->startDateAvailabilityType = $startDateAvailabilityType;

        return $this;
    }

    public function getEndDateAvailabilityType(): ?int
    {
        return $this->endDateAvailabilityType;
    }

    public function setEndDateAvailabilityType(?int $endDateAvailabilityType): static
    {
        $this->endDateAvailabilityType = $endDateAvailabilityType;

        return $this;
    }
}
