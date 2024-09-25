<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SISCourseMergeLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SIS Course Merge Log Brightspace Data Set returns a list of attempts to merge or unmerge course offerings using
 * the SIS Course Merge tool. This data set only captures data from July 2023 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/19147-sis-course-merge-data-sets#sis-course-merge-log
 */
#[ORM\Entity(repositoryClass: SISCourseMergeLogRepository::class)]
#[ORM\Table(name: 'D2L_SIS_COURSE_MERGE_LOG')]
#[UniqueConstraint(name: 'D2L_SIS_COURSE_MERGE_LOG_PUK', columns: ['BatchId', 'OriginalSourceOrgUnitId', 'Timestamp'])]
final class SISCourseMergeLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * The batch ID for this job.
     */
    #[ORM\Column(name: 'BatchId', type: Types::GUID, nullable: false)]
    private ?string $batchId = null;

    /**
     * What type of job was requested: Merge or Unmerge.
     */
    #[ORM\Column(name: 'JobType', length: 64, nullable: true)]
    private ?string $jobType = null;

    /**
     * The status of the job: Started, CompletedWithErrors, Completed, or Failed.
     */
    #[ORM\Column(name: 'Status', length: 64, nullable: true)]
    private ?string $status = null;

    /**
     * The target course which the source courses are merged or were originally merged into.
     */
    #[ORM\Column(name: 'OriginalTargetOrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $originalTargetOrgUnitId = null;

    /**
     * The source course which is being merged or was previously merged into the target.
     */
    #[ORM\Column(name: 'OriginalSourceOrgUnitId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $originalSourceOrgUnitId = null;

    /**
     * The ID of the source system that this course belongs to.
     */
    #[ORM\Column(name: 'SourceSystemId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $sourceSystemId = null;

    /**
     * The total number of source courses with the same batch ID being attempted to merge or unmerge. Only shown for
     * course merge jobs with the "Started" status. Field can be null.
     */
    #[ORM\Column(name: 'NumberOfCoursesInBatch', precision: 10, nullable: true)]
    private ?int $numberOfCoursesInBatch = null;

    /**
     * The user who requested the merge or unmerge.
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * The type of error that occurred. Possible values: Field can be null.
     */
    #[ORM\Column(name: 'ErrorType', length: 96, nullable: true)]
    private ?string $errorType = null;

    /**
     * The date and time when the merge or unmerge event occurred (UTC).
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $timestamp = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getBatchId(): ?string
    {
        return $this->batchId;
    }

    public function setBatchId(string $batchId): static
    {
        $this->batchId = $batchId;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(?string $jobType): static
    {
        $this->jobType = $jobType;

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

    public function getOriginalTargetOrgUnitId(): ?string
    {
        return $this->originalTargetOrgUnitId;
    }

    public function setOriginalTargetOrgUnitId(?string $originalTargetOrgUnitId): static
    {
        $this->originalTargetOrgUnitId = $originalTargetOrgUnitId;

        return $this;
    }

    public function getOriginalSourceOrgUnitId(): ?string
    {
        return $this->originalSourceOrgUnitId;
    }

    public function setOriginalSourceOrgUnitId(string $originalSourceOrgUnitId): static
    {
        $this->originalSourceOrgUnitId = $originalSourceOrgUnitId;

        return $this;
    }

    public function getSourceSystemId(): ?string
    {
        return $this->sourceSystemId;
    }

    public function setSourceSystemId(?string $sourceSystemId): static
    {
        $this->sourceSystemId = $sourceSystemId;

        return $this;
    }

    public function getNumberOfCoursesInBatch(): ?int
    {
        return $this->numberOfCoursesInBatch;
    }

    public function setNumberOfCoursesInBatch(?int $numberOfCoursesInBatch): static
    {
        $this->numberOfCoursesInBatch = $numberOfCoursesInBatch;

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

    public function getErrorType(): ?string
    {
        return $this->errorType;
    }

    public function setErrorType(?string $errorType): static
    {
        $this->errorType = $errorType;

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
}
