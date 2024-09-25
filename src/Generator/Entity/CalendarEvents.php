<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CalendarEventsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Calendar Events Brightspace Data Set returns a list of calendar events and their details for your org units.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4521-calendar-data-sets#calendar-events
 */
#[ORM\Entity(repositoryClass: CalendarEventsRepository::class)]
#[ORM\Table(name: 'D2L_CALENDAR_EVENT')]
#[UniqueConstraint(name: 'D2L_CALENDAR_EVENT_PUK', columns: ['ScheduleId'])]
final class CalendarEvents
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the scheduled event
     */
    #[ORM\Column(name: 'ScheduleId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $scheduleId = null;

    /**
     * Unique org unit identifier. For course-level events, the org unit ID displays. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * Unique user identifier. For user-level events, the user ID displays. Field can be null.
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * Calendar event title.
     */
    #[ORM\Column(name: 'Title', length: 512, nullable: true)]
    private ?string $title = null;

    /**
     * Calendar event start date. Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Calendar event end date. Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Time zone identifier.
     */
    #[ORM\Column(name: 'TimeZoneIdentifier', length: 512, nullable: true)]
    private ?string $timeZoneIdentifier = null;

    /**
     * Is all day event
     */
    #[ORM\Column(name: 'IsAllDayEvent', nullable: true)]
    private ?bool $isAllDayEvent = null;

    /**
     * Calendar recurrence type: None, Daily, Weekly, Monthly, Yearly. Field can be null.
     */
    #[ORM\Column(name: 'RecurrenceType', length: 14, nullable: true)]
    private ?string $recurrenceType = null;

    /**
     * Calendar recurrence interval.
     */
    #[ORM\Column(name: 'RecurrenceInterval', precision: 10, nullable: true)]
    private ?int $recurrenceInterval = null;

    /**
     * Created by user ID.
     */
    #[ORM\Column(name: 'CreatedByUserId', precision: 10, nullable: true)]
    private ?int $createdByUserId = null;

    /**
     * Last modified date and time.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * If event is associated with an object, displays the object type name. Field can be null.
     */
    #[ORM\Column(name: 'EventObjectTypeName', length: 400, nullable: true)]
    private ?string $eventObjectTypeName = null;

    /**
     * Shows primary look-up object ID of the associated object. Field can be null.
     */
    #[ORM\Column(name: 'ObjectLookupId1', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectLookupId1 = null;

    /**
     * Shows secondary look-up object ID of the associated object. Field can be null.
     */
    #[ORM\Column(name: 'ObjectLookupId2', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectLookupId2 = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getScheduleId(): ?string
    {
        return $this->scheduleId;
    }

    public function setScheduleId(string $scheduleId): static
    {
        $this->scheduleId = $scheduleId;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?string $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

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

    public function getTimeZoneIdentifier(): ?string
    {
        return $this->timeZoneIdentifier;
    }

    public function setTimeZoneIdentifier(?string $timeZoneIdentifier): static
    {
        $this->timeZoneIdentifier = $timeZoneIdentifier;

        return $this;
    }

    public function isAllDayEvent(): ?bool
    {
        return $this->isAllDayEvent;
    }

    public function setAllDayEvent(?bool $isAllDayEvent): static
    {
        $this->isAllDayEvent = $isAllDayEvent;

        return $this;
    }

    public function getRecurrenceType(): ?string
    {
        return $this->recurrenceType;
    }

    public function setRecurrenceType(?string $recurrenceType): static
    {
        $this->recurrenceType = $recurrenceType;

        return $this;
    }

    public function getRecurrenceInterval(): ?int
    {
        return $this->recurrenceInterval;
    }

    public function setRecurrenceInterval(?int $recurrenceInterval): static
    {
        $this->recurrenceInterval = $recurrenceInterval;

        return $this;
    }

    public function getCreatedByUserId(): ?int
    {
        return $this->createdByUserId;
    }

    public function setCreatedByUserId(?int $createdByUserId): static
    {
        $this->createdByUserId = $createdByUserId;

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

    public function getEventObjectTypeName(): ?string
    {
        return $this->eventObjectTypeName;
    }

    public function setEventObjectTypeName(?string $eventObjectTypeName): static
    {
        $this->eventObjectTypeName = $eventObjectTypeName;

        return $this;
    }

    public function getObjectLookupId1(): ?string
    {
        return $this->objectLookupId1;
    }

    public function setObjectLookupId1(?string $objectLookupId1): static
    {
        $this->objectLookupId1 = $objectLookupId1;

        return $this;
    }

    public function getObjectLookupId2(): ?string
    {
        return $this->objectLookupId2;
    }

    public function setObjectLookupId2(?string $objectLookupId2): static
    {
        $this->objectLookupId2 = $objectLookupId2;

        return $this;
    }
}
