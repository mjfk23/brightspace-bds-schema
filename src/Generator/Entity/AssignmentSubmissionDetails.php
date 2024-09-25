<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AssignmentSubmissionDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Assignment Submission Details Brightspace Data Set returns details of each individual submission made by the user
 * for all your org units. Results are ordered from newest to oldest.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4767-assignments-data-sets#assignment-submission-details
 */
#[ORM\Entity(repositoryClass: AssignmentSubmissionDetailsRepository::class)]
#[ORM\Table(name: 'D2L_ASSIGNMENT_SUBMISSION_DETAIL')]
#[UniqueConstraint(name: 'D2L_ASSIGNMENT_SUBMISSION_DETAIL_PUK', columns: ['SubmissionId'])]
final class AssignmentSubmissionDetails
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique submission identifier
     */
    #[ORM\Column(name: 'SubmissionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $submissionId = null;

    /**
     * Unique assignment identifier
     */
    #[ORM\Column(name: 'DropboxId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $dropboxId = null;

    /**
     * Unique user identifier. Field can be null.
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * Unique group identifier for the submission made to the assignment. Field can be null.
     */
    #[ORM\Column(name: 'GroupId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $groupId = null;

    /**
     * Number of files submitted. Field can be null.
     */
    #[ORM\Column(name: 'NumberOfFilesSubmitted', precision: 10, nullable: true)]
    private ?int $numberOfFilesSubmitted = null;

    /**
     * Total file size of all submissions made, in bytes.
     */
    #[ORM\Column(name: 'TotalFileSize', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $totalFileSize = null;

    /**
     * Submission made by user ID
     */
    #[ORM\Column(name: 'SubmittedByUserId', precision: 10, nullable: true)]
    private ?int $submittedByUserId = null;

    /**
     * Date the submission was made (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateSubmitted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateSubmitted = null;

    /**
     * Comments on the submission. Field can be null.
     */
    #[ORM\Column(name: 'Comments', length: 2000, nullable: true)]
    private ?string $comments = null;

    /**
     * Is exempt from TurnItIn. Field can be null.
     */
    #[ORM\Column(name: 'IsTurnItInExempt', nullable: true)]
    private ?bool $isTurnItInExempt = null;

    /**
     * Is submission deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Is submission preview
     */
    #[ORM\Column(name: 'IsPreview', nullable: true)]
    private ?bool $isPreview = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getDropboxId(): ?string
    {
        return $this->dropboxId;
    }

    public function setDropboxId(?string $dropboxId): static
    {
        $this->dropboxId = $dropboxId;

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

    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    public function setGroupId(?string $groupId): static
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getNumberOfFilesSubmitted(): ?int
    {
        return $this->numberOfFilesSubmitted;
    }

    public function setNumberOfFilesSubmitted(?int $numberOfFilesSubmitted): static
    {
        $this->numberOfFilesSubmitted = $numberOfFilesSubmitted;

        return $this;
    }

    public function getTotalFileSize(): ?string
    {
        return $this->totalFileSize;
    }

    public function setTotalFileSize(?string $totalFileSize): static
    {
        $this->totalFileSize = $totalFileSize;

        return $this;
    }

    public function getSubmittedByUserId(): ?int
    {
        return $this->submittedByUserId;
    }

    public function setSubmittedByUserId(?int $submittedByUserId): static
    {
        $this->submittedByUserId = $submittedByUserId;

        return $this;
    }

    public function getDateSubmitted(): ?\DateTimeImmutable
    {
        return $this->dateSubmitted;
    }

    public function setDateSubmitted(?\DateTimeImmutable $dateSubmitted): static
    {
        $this->dateSubmitted = $dateSubmitted;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    public function isTurnItInExempt(): ?bool
    {
        return $this->isTurnItInExempt;
    }

    public function setTurnItInExempt(?bool $isTurnItInExempt): static
    {
        $this->isTurnItInExempt = $isTurnItInExempt;

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

    public function isPreview(): ?bool
    {
        return $this->isPreview;
    }

    public function setPreview(?bool $isPreview): static
    {
        $this->isPreview = $isPreview;

        return $this;
    }
}
