<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizAttemptsLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Attempts Log Brightspace Data Set returns details on the events that occur during a quiz attempt. This data
 * set includes completed quiz attempts and in-progress quiz attempts. There is no explicit time cap placed on this data
 * set. However, data is sorted from newest to oldest and older data will be dropped if the data set reaches the row
 * limit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4532-quizzes-data-sets#quiz-attempts-log
 */
#[ORM\Entity(repositoryClass: QuizAttemptsLogRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_ATTEMPT_LOG')]
#[UniqueConstraint(name: 'D2L_QUIZ_ATTEMPT_LOG_PUK', columns: ['LogId'])]
final class QuizAttemptsLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique log identifier
     */
    #[ORM\Column(name: 'LogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique attempt identifier
     */
    #[ORM\Column(name: 'AttemptId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $attemptId = null;

    /**
     * Unique event type identifier
     */
    #[ORM\Column(name: 'EventTypeId', precision: 10, nullable: true)]
    private ?int $eventTypeId = null;

    /**
     * Name of the event. Field can be null.
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Description of the event. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 512, nullable: true)]
    private ?string $description = null;

    /**
     * Event occurred time (UTC).
     */
    #[ORM\Column(name: 'EventTime', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $eventTime = null;

    /**
     * IPAddress at which the event occurred. Field can be null.
     */
    #[ORM\Column(name: 'IPAddress', length: 30, nullable: true)]
    private ?string $iPAddress = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLogId(): ?string
    {
        return $this->logId;
    }

    public function setLogId(string $logId): static
    {
        $this->logId = $logId;

        return $this;
    }

    public function getAttemptId(): ?string
    {
        return $this->attemptId;
    }

    public function setAttemptId(?string $attemptId): static
    {
        $this->attemptId = $attemptId;

        return $this;
    }

    public function getEventTypeId(): ?int
    {
        return $this->eventTypeId;
    }

    public function setEventTypeId(?int $eventTypeId): static
    {
        $this->eventTypeId = $eventTypeId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEventTime(): ?\DateTimeImmutable
    {
        return $this->eventTime;
    }

    public function setEventTime(?\DateTimeImmutable $eventTime): static
    {
        $this->eventTime = $eventTime;

        return $this;
    }

    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    public function setIPAddress(?string $iPAddress): static
    {
        $this->iPAddress = $iPAddress;

        return $this;
    }
}
