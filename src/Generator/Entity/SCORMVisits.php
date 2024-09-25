<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMVisitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Visits Brightspace Data Set lists each user visit on each SCORM object, the overall completion status, and
 * time spent on the visit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-visits
 */
#[ORM\Entity(repositoryClass: SCORMVisitsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_VISIT')]
#[UniqueConstraint(name: 'D2L_SCORM_VISIT_PUK', columns: ['VisitId'])]
final class SCORMVisits
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each SCORM visit.
     */
    #[ORM\Column(name: 'VisitId', type: Types::GUID, nullable: false)]
    private ?string $visitId = null;

    /**
     * Unique identifier of the SCORM object.
     */
    #[ORM\Column(name: 'ScormObjectId', type: Types::GUID, nullable: true)]
    private ?string $scormObjectId = null;

    /**
     * User associated with the SCORM visit.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The date the user first accessed the SCORM object. Field can be null.
     */
    #[ORM\Column(name: 'FirstAccessDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $firstAccessDate = null;

    /**
     * The date the user last accessed the SCORM object. Field can be null.
     */
    #[ORM\Column(name: 'LastAccessDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastAccessDate = null;

    /**
     * The date the user first completed the SCORM object. Field can be null.
     */
    #[ORM\Column(name: 'CompletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $completedDate = null;

    /**
     * The completion status of the user for the SCORM object. One of UNKNOWN, COMPLETED, or INCOMPLETE. Field can be
     * null.
     */
    #[ORM\Column(name: 'Completion', length: 200, nullable: true)]
    private ?string $completion = null;

    /**
     * The success status of the user for the SCORM object. One of UNKNOWN, PASSED, or FAILED. Field can be null.
     */
    #[ORM\Column(name: 'Success', length: 200, nullable: true)]
    private ?string $success = null;

    /**
     * The score attained by the user for the SCORM object, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'Score', nullable: true)]
    private ?float $score = null;

    /**
     * The amount of time the user has had the SCORM object open, in seconds. Field can be null.
     */
    #[ORM\Column(name: 'TimeSpent', precision: 10, nullable: true)]
    private ?int $timeSpent = null;

    /**
     * How much of the activity has been completed, between 0 and 100. Field can be null.
     */
    #[ORM\Column(name: 'Progress', nullable: true)]
    private ?float $progress = null;

    /**
     * Date when the activity was last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getVisitId(): ?string
    {
        return $this->visitId;
    }

    public function setVisitId(string $visitId): static
    {
        $this->visitId = $visitId;

        return $this;
    }

    public function getScormObjectId(): ?string
    {
        return $this->scormObjectId;
    }

    public function setScormObjectId(?string $scormObjectId): static
    {
        $this->scormObjectId = $scormObjectId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

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

    public function getFirstAccessDate(): ?\DateTimeImmutable
    {
        return $this->firstAccessDate;
    }

    public function setFirstAccessDate(?\DateTimeImmutable $firstAccessDate): static
    {
        $this->firstAccessDate = $firstAccessDate;

        return $this;
    }

    public function getLastAccessDate(): ?\DateTimeImmutable
    {
        return $this->lastAccessDate;
    }

    public function setLastAccessDate(?\DateTimeImmutable $lastAccessDate): static
    {
        $this->lastAccessDate = $lastAccessDate;

        return $this;
    }

    public function getCompletedDate(): ?\DateTimeImmutable
    {
        return $this->completedDate;
    }

    public function setCompletedDate(?\DateTimeImmutable $completedDate): static
    {
        $this->completedDate = $completedDate;

        return $this;
    }

    public function getCompletion(): ?string
    {
        return $this->completion;
    }

    public function setCompletion(?string $completion): static
    {
        $this->completion = $completion;

        return $this;
    }

    public function getSuccess(): ?string
    {
        return $this->success;
    }

    public function setSuccess(?string $success): static
    {
        $this->success = $success;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getTimeSpent(): ?int
    {
        return $this->timeSpent;
    }

    public function setTimeSpent(?int $timeSpent): static
    {
        $this->timeSpent = $timeSpent;

        return $this;
    }

    public function getProgress(): ?float
    {
        return $this->progress;
    }

    public function setProgress(?float $progress): static
    {
        $this->progress = $progress;

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
