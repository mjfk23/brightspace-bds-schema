<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\VirtualClassroomUsageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Virtual Classroom Usage Brightspace Data Set returns information about how Virtual Classroom by Bongo is being
 * used for Bongo Premium customers. The first data point is from July 1, 2018 and the data set will only appear for
 * Bongo Premium customers if there is usage to retrieve. Note: The data includes all Virtual Classroom meetings that
 * have ever been created. Cancelled meetings can be identified using the IsCancelled field, and do not appear in the
 * LTI Links Brightspace Data Set. The Virtual Classroom UI only displays meetings that are scheduled to occur in the
 * future, or have occurred and were recorded. Note: This data set is available as a FULL CSV containing all of the data
 * and does not include a differential. Data is produced on a weekly basis, regardless of whether you purchased the
 * hourly data freshness add-on. Since the data is owned by Bongo, data set generation is done on a region schedule and
 * may not align to existing schedules.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4541-virtual-classroom-data-sets#virtual-classroom-usage
 */
#[ORM\Entity(repositoryClass: VirtualClassroomUsageRepository::class)]
#[ORM\Table(name: 'D2L_VIRTUAL_CLASSROOM_USAGE')]
#[UniqueConstraint(name: 'D2L_VIRTUAL_CLASSROOM_USAGE_PUK', columns: ['MeetingId'])]
final class VirtualClassroomUsage
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier of the course where the meeting was scheduled. Will be null if the meeting was
     * cancelled.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The name of the course where the meeting was scheduled. Will be null if the meeting was cancelled.
     */
    #[ORM\Column(name: 'CourseName', length: 510, nullable: true)]
    private ?string $courseName = null;

    /**
     * Unique meeting identifier. If a meeting is reoccurring, each occurrence is represented in a new row.
     */
    #[ORM\Column(name: 'MeetingId', length: 72, nullable: false)]
    private ?string $meetingId = null;

    /**
     * The name of the Virtual Classroom meeting.
     */
    #[ORM\Column(name: 'MeetingName', length: 510, nullable: true)]
    private ?string $meetingName = null;

    /**
     * Unique identifier of the user who scheduled the meeting.
     */
    #[ORM\Column(name: 'CreationUserId', precision: 10, nullable: true)]
    private ?int $creationUserId = null;

    /**
     * The date and time the meeting was created (UTC).
     */
    #[ORM\Column(name: 'CreationDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $creationDate = null;

    /**
     * The date and time the meeting is scheduled to start (UTC).
     */
    #[ORM\Column(name: 'ScheduledDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $scheduledDate = null;

    /**
     * Planned length of the meeting in minutes.
     */
    #[ORM\Column(name: 'ScheduledDuration', precision: 10, nullable: true)]
    private ?int $scheduledDuration = null;

    /**
     * Indicates if the option to automatically publish the recording to attendees is enabled.
     */
    #[ORM\Column(name: 'IsPublished', nullable: true)]
    private ?bool $isPublished = null;

    /**
     * Indicates if the option to use external links to join the meeting was enabled when the Virtual Classroom session
     * was scheduled.
     */
    #[ORM\Column(name: 'ExternalLinksEnabled', nullable: true)]
    private ?bool $externalLinksEnabled = null;

    /**
     * Indicates if all users in an org unit were invited.
     */
    #[ORM\Column(name: 'WholeClassInvited', nullable: true)]
    private ?bool $wholeClassInvited = null;

    /**
     * Indicates if the meeting is cancelled. Comparable to IsDeleted in other data sets.
     */
    #[ORM\Column(name: 'IsCancelled', nullable: true)]
    private ?bool $isCancelled = null;

    /**
     * The DateTime that the Virtual Classroom session was started (UTC). Will be null if the meeting was not started or
     * canceled.
     */
    #[ORM\Column(name: 'StartDateTime', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDateTime = null;

    /**
     * The DateTime that the Virtual Classroom session was ended (UTC). Will be null if the meeting was not started or
     * canceled.
     */
    #[ORM\Column(name: 'EndDateTime', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDateTime = null;

    /**
     * Indicates if the meeting was recorded.
     */
    #[ORM\Column(name: 'IsRecorded', nullable: true)]
    private ?bool $isRecorded = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getCourseName(): ?string
    {
        return $this->courseName;
    }

    public function setCourseName(?string $courseName): static
    {
        $this->courseName = $courseName;

        return $this;
    }

    public function getMeetingId(): ?string
    {
        return $this->meetingId;
    }

    public function setMeetingId(string $meetingId): static
    {
        $this->meetingId = $meetingId;

        return $this;
    }

    public function getMeetingName(): ?string
    {
        return $this->meetingName;
    }

    public function setMeetingName(?string $meetingName): static
    {
        $this->meetingName = $meetingName;

        return $this;
    }

    public function getCreationUserId(): ?int
    {
        return $this->creationUserId;
    }

    public function setCreationUserId(?int $creationUserId): static
    {
        $this->creationUserId = $creationUserId;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getScheduledDate(): ?\DateTimeImmutable
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(?\DateTimeImmutable $scheduledDate): static
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    public function getScheduledDuration(): ?int
    {
        return $this->scheduledDuration;
    }

    public function setScheduledDuration(?int $scheduledDuration): static
    {
        $this->scheduledDuration = $scheduledDuration;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(?bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function isExternalLinksEnabled(): ?bool
    {
        return $this->externalLinksEnabled;
    }

    public function setExternalLinksEnabled(?bool $externalLinksEnabled): static
    {
        $this->externalLinksEnabled = $externalLinksEnabled;

        return $this;
    }

    public function isWholeClassInvited(): ?bool
    {
        return $this->wholeClassInvited;
    }

    public function setWholeClassInvited(?bool $wholeClassInvited): static
    {
        $this->wholeClassInvited = $wholeClassInvited;

        return $this;
    }

    public function isCancelled(): ?bool
    {
        return $this->isCancelled;
    }

    public function setCancelled(?bool $isCancelled): static
    {
        $this->isCancelled = $isCancelled;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeImmutable
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(?\DateTimeImmutable $startDateTime): static
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeImmutable
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(?\DateTimeImmutable $endDateTime): static
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    public function isRecorded(): ?bool
    {
        return $this->isRecorded;
    }

    public function setRecorded(?bool $isRecorded): static
    {
        $this->isRecorded = $isRecorded;

        return $this;
    }
}
