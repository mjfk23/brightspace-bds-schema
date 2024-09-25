<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CourseCopyLogsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Copy Logs Brightspace Data Set returns a list of course copy jobs.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4725-course-copy-data-sets#course-copy-logs
 */
#[ORM\Entity(repositoryClass: CourseCopyLogsRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_COPY_LOG')]
#[UniqueConstraint(name: 'D2L_COURSE_COPY_LOG_PUK', columns: ['CopyCourseJobId'])]
final class CourseCopyLogs
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique source org unit identifier
     */
    #[ORM\Column(name: 'SourceOrgUnitId', precision: 10, nullable: true)]
    private ?int $sourceOrgUnitId = null;

    /**
     * Unique destination org unit identifier
     */
    #[ORM\Column(name: 'DestinationOrgUnitId', precision: 10, nullable: true)]
    private ?int $destinationOrgUnitId = null;

    /**
     * Unique user identifier. Field can be null.
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * Status of copy
     */
    #[ORM\Column(name: 'Status', length: 256, nullable: true)]
    private ?string $status = null;

    /**
     * Start date time (UTC)
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * End date time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Is the copy destination new
     */
    #[ORM\Column(name: 'IsDestinationNew', nullable: true)]
    private ?bool $isDestinationNew = null;

    /**
     * Copy protected resources
     */
    #[ORM\Column(name: 'CopyProtectedResources', nullable: true)]
    private ?bool $copyProtectedResources = null;

    /**
     * Unique copy course job identifier
     */
    #[ORM\Column(name: 'CopyCourseJobId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $copyCourseJobId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getSourceOrgUnitId(): ?int
    {
        return $this->sourceOrgUnitId;
    }

    public function setSourceOrgUnitId(?int $sourceOrgUnitId): static
    {
        $this->sourceOrgUnitId = $sourceOrgUnitId;

        return $this;
    }

    public function getDestinationOrgUnitId(): ?int
    {
        return $this->destinationOrgUnitId;
    }

    public function setDestinationOrgUnitId(?int $destinationOrgUnitId): static
    {
        $this->destinationOrgUnitId = $destinationOrgUnitId;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

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

    public function isDestinationNew(): ?bool
    {
        return $this->isDestinationNew;
    }

    public function setDestinationNew(?bool $isDestinationNew): static
    {
        $this->isDestinationNew = $isDestinationNew;

        return $this;
    }

    public function isCopyProtectedResources(): ?bool
    {
        return $this->copyProtectedResources;
    }

    public function setCopyProtectedResources(?bool $copyProtectedResources): static
    {
        $this->copyProtectedResources = $copyProtectedResources;

        return $this;
    }

    public function getCopyCourseJobId(): ?string
    {
        return $this->copyCourseJobId;
    }

    public function setCopyCourseJobId(string $copyCourseJobId): static
    {
        $this->copyCourseJobId = $copyCourseJobId;

        return $this;
    }
}
