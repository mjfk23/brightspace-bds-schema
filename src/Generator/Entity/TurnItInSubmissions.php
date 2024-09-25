<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\TurnItInSubmissionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The TurnItIn Submissions Brightspace Data Set returns details of assignment submissions shared with TurnItIn version
 * 2.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4767-assignments-data-sets#turnitin-submissions
 */
#[ORM\Entity(repositoryClass: TurnItInSubmissionsRepository::class)]
#[ORM\Table(name: 'D2L_TURNITIN_SUBMISSION')]
#[UniqueConstraint(name: 'D2L_TURNITIN_SUBMISSION_PUK', columns: ['SubmissionId', 'FileId'])]
final class TurnItInSubmissions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique assignment identifier.
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $dropboxId = null;

    /**
     * Unique assignment submission identifier
     */
    #[ORM\Column(name: 'SubmissionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $submissionId = null;

    /**
     * Unique file identifier.
     */
    #[ORM\Column(name: 'FileId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $fileId = null;

    /**
     * Most recent submission time stamp (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastSubmissionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastSubmissionDate = null;

    /**
     * Status of assignment submission
     */
    #[ORM\Column(name: 'SubmissionStatus', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $submissionStatus = null;

    /**
     * Type of submission error
     */
    #[ORM\Column(name: 'SubmissionErrorType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $submissionErrorType = null;

    /**
     * Error message upon submission if applicable. Field can be null.
     */
    #[ORM\Column(name: 'ErrorMessage', length: 510, nullable: true)]
    private ?string $errorMessage = null;

    /**
     * UserId of user who submitted the assignment to TurnItIn. Field can be null.
     */
    #[ORM\Column(name: 'SubmittedBy', precision: 10, nullable: true)]
    private ?int $submittedBy = null;

    /**
     * Most recent submission refresh time stamp (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastRefreshDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastRefreshDate = null;

    /**
     * Last time the submission was modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getDropboxId(): ?string
    {
        return $this->dropboxId;
    }

    public function setDropboxId(?string $dropboxId): static
    {
        $this->dropboxId = $dropboxId;

        return $this;
    }

    public function getSubmissionId(): ?string
    {
        return $this->submissionId;
    }

    public function setSubmissionId(string $submissionId): static
    {
        $this->submissionId = $submissionId;

        return $this;
    }

    public function getFileId(): ?string
    {
        return $this->fileId;
    }

    public function setFileId(string $fileId): static
    {
        $this->fileId = $fileId;

        return $this;
    }

    public function getLastSubmissionDate(): ?\DateTimeImmutable
    {
        return $this->lastSubmissionDate;
    }

    public function setLastSubmissionDate(?\DateTimeImmutable $lastSubmissionDate): static
    {
        $this->lastSubmissionDate = $lastSubmissionDate;

        return $this;
    }

    public function getSubmissionStatus(): ?int
    {
        return $this->submissionStatus;
    }

    public function setSubmissionStatus(?int $submissionStatus): static
    {
        $this->submissionStatus = $submissionStatus;

        return $this;
    }

    public function getSubmissionErrorType(): ?int
    {
        return $this->submissionErrorType;
    }

    public function setSubmissionErrorType(?int $submissionErrorType): static
    {
        $this->submissionErrorType = $submissionErrorType;

        return $this;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(?string $errorMessage): static
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getSubmittedBy(): ?int
    {
        return $this->submittedBy;
    }

    public function setSubmittedBy(?int $submittedBy): static
    {
        $this->submittedBy = $submittedBy;

        return $this;
    }

    public function getLastRefreshDate(): ?\DateTimeImmutable
    {
        return $this->lastRefreshDate;
    }

    public function setLastRefreshDate(?\DateTimeImmutable $lastRefreshDate): static
    {
        $this->lastRefreshDate = $lastRefreshDate;

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
}
