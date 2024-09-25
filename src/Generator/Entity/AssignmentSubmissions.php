<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AssignmentSubmissionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Assignment Submissions Brightspace Data Set returns a high-level summary information of all submissions made by a
 * user to a given assignment for all your org units. Results are ordered from newest to oldest.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4767-assignments-data-sets#assignment-submissions
 */
#[ORM\Entity(repositoryClass: AssignmentSubmissionsRepository::class)]
#[ORM\Table(name: 'D2L_ASSIGNMENT_SUBMISSION')]
#[UniqueConstraint(name: 'D2L_ASSIGNMENT_SUBMISSION_PUK', columns: ['DropboxId', 'SubmitterId'])]
final class AssignmentSubmissions
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
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The user or group ID of the submitter.
     */
    #[ORM\Column(name: 'SubmitterId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $submitterId = null;

    /**
     * The type submission, either user or group. Field can be null.
     */
    #[ORM\Column(name: 'SubmitterType', length: 10, nullable: true)]
    private ?string $submitterType = null;

    /**
     * Number of files submitted to the assignment
     */
    #[ORM\Column(name: 'FileSubmissionCount', precision: 10, nullable: true)]
    private ?int $fileSubmissionCount = null;

    /**
     * Total file size of all submissions, in bytes.
     */
    #[ORM\Column(name: 'TotalFileSize', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $totalFileSize = null;

    /**
     * Feedback by user ID. Field can be null.
     */
    #[ORM\Column(name: 'FeedbackUserId', precision: 10, nullable: true)]
    private ?int $feedbackUserId = null;

    /**
     * Is feedback read
     */
    #[ORM\Column(name: 'FeedbackIsRead', nullable: true)]
    private ?bool $feedbackIsRead = null;

    /**
     * Score the user achieved on the assignment submission. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Is assignment submission graded
     */
    #[ORM\Column(name: 'IsGraded', nullable: true)]
    private ?bool $isGraded = null;

    /**
     * Last submission date time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastSubmissionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastSubmissionDate = null;

    /**
     * Instructor feedback. Field can be null.
     */
    #[ORM\Column(name: 'Feedback', length: 2000, nullable: true)]
    private ?string $feedback = null;

    /**
     * Last modified date time for draft and published feedback (UTC). Field can be null.
     */
    #[ORM\Column(name: 'FeedbackLastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $feedbackLastModified = null;

    /**
     * First date time that feedback is read (UTC). Field can be null.
     */
    #[ORM\Column(name: 'FeedbackReadDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $feedbackReadDate = null;

    /**
     * Indicates the date when the assignment was submitted by the learner (UTC). Field can be null.
     */
    #[ORM\Column(name: 'CompletionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $completionDate = null;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getSubmitterId(): ?string
    {
        return $this->submitterId;
    }

    public function setSubmitterId(string $submitterId): static
    {
        $this->submitterId = $submitterId;

        return $this;
    }

    public function getSubmitterType(): ?string
    {
        return $this->submitterType;
    }

    public function setSubmitterType(?string $submitterType): static
    {
        $this->submitterType = $submitterType;

        return $this;
    }

    public function getFileSubmissionCount(): ?int
    {
        return $this->fileSubmissionCount;
    }

    public function setFileSubmissionCount(?int $fileSubmissionCount): static
    {
        $this->fileSubmissionCount = $fileSubmissionCount;

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

    public function getFeedbackUserId(): ?int
    {
        return $this->feedbackUserId;
    }

    public function setFeedbackUserId(?int $feedbackUserId): static
    {
        $this->feedbackUserId = $feedbackUserId;

        return $this;
    }

    public function isFeedbackIsRead(): ?bool
    {
        return $this->feedbackIsRead;
    }

    public function setFeedbackIsRead(?bool $feedbackIsRead): static
    {
        $this->feedbackIsRead = $feedbackIsRead;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function isGraded(): ?bool
    {
        return $this->isGraded;
    }

    public function setGraded(?bool $isGraded): static
    {
        $this->isGraded = $isGraded;

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

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): static
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getFeedbackLastModified(): ?\DateTimeImmutable
    {
        return $this->feedbackLastModified;
    }

    public function setFeedbackLastModified(?\DateTimeImmutable $feedbackLastModified): static
    {
        $this->feedbackLastModified = $feedbackLastModified;

        return $this;
    }

    public function getFeedbackReadDate(): ?\DateTimeImmutable
    {
        return $this->feedbackReadDate;
    }

    public function setFeedbackReadDate(?\DateTimeImmutable $feedbackReadDate): static
    {
        $this->feedbackReadDate = $feedbackReadDate;

        return $this;
    }

    public function getCompletionDate(): ?\DateTimeImmutable
    {
        return $this->completionDate;
    }

    public function setCompletionDate(?\DateTimeImmutable $completionDate): static
    {
        $this->completionDate = $completionDate;

        return $this;
    }
}
