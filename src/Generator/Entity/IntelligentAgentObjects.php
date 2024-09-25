<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\IntelligentAgentObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Intelligent Agent Objects Brightspace Data Set describes all the intelligent agents created in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4528-intelligent-agents-data-sets#intelligent-agent-objects
 */
#[ORM\Entity(repositoryClass: IntelligentAgentObjectsRepository::class)]
#[ORM\Table(name: 'D2L_INTELLIGENT_AGENT_OBJECT')]
#[UniqueConstraint(name: 'D2L_INTELLIGENT_AGENT_OBJECT_PUK', columns: ['AgentId'])]
final class IntelligentAgentObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique agent identifier.
     */
    #[ORM\Column(name: 'AgentId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $agentId = null;

    /**
     * Unique org unit identifier where the agent was created.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Name of intelligent agent.
     */
    #[ORM\Column(name: 'AgentName', length: 256, nullable: true)]
    private ?string $agentName = null;

    /**
     * The description of the intelligent agent. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indicates if the agent is enabled.
     */
    #[ORM\Column(name: 'Enabled', nullable: true)]
    private ?bool $enabled = null;

    /**
     * Array of the roles the agent allies to. If null, it applies to all users visible in the Classlist. Field can be
     * null.
     */
    #[ORM\Column(name: 'SpecificRoles', length: 2000, nullable: true)]
    private ?string $specificRoles = null;

    /**
     * Indicates if the agent looks at login activity.
     */
    #[ORM\Column(name: 'LoginConditionEnabled', nullable: true)]
    private ?bool $loginConditionEnabled = null;

    /**
     * Number of days the login threshold is set to. Field can be null.
     */
    #[ORM\Column(name: 'LoginConditionThreshold', precision: 10, nullable: true)]
    private ?int $loginConditionThreshold = null;

    /**
     * The type of login activity: User has not logged in for at least X days or user has logged in during the past X
     * days. Field can be null.
     */
    #[ORM\Column(name: 'LoginConditionType', length: 28, nullable: true)]
    private ?string $loginConditionType = null;

    /**
     * Indicates if the agent looks at course access activity.
     */
    #[ORM\Column(name: 'AccessConditionEnabled', nullable: true)]
    private ?bool $accessConditionEnabled = null;

    /**
     * Number of days the course activity threshold is set to. Field can be null.
     */
    #[ORM\Column(name: 'AccessConditionThreshold', precision: 10, nullable: true)]
    private ?int $accessConditionThreshold = null;

    /**
     * The type of course activity: User has not accessed course in for at least X days or user has accessed course in
     * during the past X days. Field can be null.
     */
    #[ORM\Column(name: 'AccessConditionType', length: 40, nullable: true)]
    private ?string $accessConditionType = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $resultId = null;

    /**
     * Indicates whether the action is taken once or every time the criteria is met for a user.
     */
    #[ORM\Column(name: 'RepeatType', length: 20, nullable: true)]
    private ?string $repeatType = null;

    /**
     * Indicates if an email is sent when the criteria are satisfied.
     */
    #[ORM\Column(name: 'EmailWhenSatisfied', nullable: true)]
    private ?bool $emailWhenSatisfied = null;

    /**
     * Indicates if a schedule is used.
     */
    #[ORM\Column(name: 'EnableSchedule', nullable: true)]
    private ?bool $enableSchedule = null;

    /**
     * Defines the frequency the schedule runs on: daily, weekly, monthly, annually. Field can be null.
     */
    #[ORM\Column(name: 'ScheduleType', length: 16, nullable: true)]
    private ?string $scheduleType = null;

    /**
     * The number of days, weeks, etc between runs. Field can be null.
     */
    #[ORM\Column(name: 'ScheduleRepeatsEvery', precision: 10, nullable: true)]
    private ?int $scheduleRepeatsEvery = null;

    /**
     * When the schedule begins (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * When the schedule ends (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * The date when the agent was last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * The unique user identifier of the user who last changed the agent. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if the agent is deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAgentId(): ?string
    {
        return $this->agentId;
    }

    public function setAgentId(string $agentId): static
    {
        $this->agentId = $agentId;

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

    public function getAgentName(): ?string
    {
        return $this->agentName;
    }

    public function setAgentName(?string $agentName): static
    {
        $this->agentName = $agentName;

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

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getSpecificRoles(): ?string
    {
        return $this->specificRoles;
    }

    public function setSpecificRoles(?string $specificRoles): static
    {
        $this->specificRoles = $specificRoles;

        return $this;
    }

    public function isLoginConditionEnabled(): ?bool
    {
        return $this->loginConditionEnabled;
    }

    public function setLoginConditionEnabled(?bool $loginConditionEnabled): static
    {
        $this->loginConditionEnabled = $loginConditionEnabled;

        return $this;
    }

    public function getLoginConditionThreshold(): ?int
    {
        return $this->loginConditionThreshold;
    }

    public function setLoginConditionThreshold(?int $loginConditionThreshold): static
    {
        $this->loginConditionThreshold = $loginConditionThreshold;

        return $this;
    }

    public function getLoginConditionType(): ?string
    {
        return $this->loginConditionType;
    }

    public function setLoginConditionType(?string $loginConditionType): static
    {
        $this->loginConditionType = $loginConditionType;

        return $this;
    }

    public function isAccessConditionEnabled(): ?bool
    {
        return $this->accessConditionEnabled;
    }

    public function setAccessConditionEnabled(?bool $accessConditionEnabled): static
    {
        $this->accessConditionEnabled = $accessConditionEnabled;

        return $this;
    }

    public function getAccessConditionThreshold(): ?int
    {
        return $this->accessConditionThreshold;
    }

    public function setAccessConditionThreshold(?int $accessConditionThreshold): static
    {
        $this->accessConditionThreshold = $accessConditionThreshold;

        return $this;
    }

    public function getAccessConditionType(): ?string
    {
        return $this->accessConditionType;
    }

    public function setAccessConditionType(?string $accessConditionType): static
    {
        $this->accessConditionType = $accessConditionType;

        return $this;
    }

    public function getResultId(): ?string
    {
        return $this->resultId;
    }

    public function setResultId(?string $resultId): static
    {
        $this->resultId = $resultId;

        return $this;
    }

    public function getRepeatType(): ?string
    {
        return $this->repeatType;
    }

    public function setRepeatType(?string $repeatType): static
    {
        $this->repeatType = $repeatType;

        return $this;
    }

    public function isEmailWhenSatisfied(): ?bool
    {
        return $this->emailWhenSatisfied;
    }

    public function setEmailWhenSatisfied(?bool $emailWhenSatisfied): static
    {
        $this->emailWhenSatisfied = $emailWhenSatisfied;

        return $this;
    }

    public function isEnableSchedule(): ?bool
    {
        return $this->enableSchedule;
    }

    public function setEnableSchedule(?bool $enableSchedule): static
    {
        $this->enableSchedule = $enableSchedule;

        return $this;
    }

    public function getScheduleType(): ?string
    {
        return $this->scheduleType;
    }

    public function setScheduleType(?string $scheduleType): static
    {
        $this->scheduleType = $scheduleType;

        return $this;
    }

    public function getScheduleRepeatsEvery(): ?int
    {
        return $this->scheduleRepeatsEvery;
    }

    public function setScheduleRepeatsEvery(?int $scheduleRepeatsEvery): static
    {
        $this->scheduleRepeatsEvery = $scheduleRepeatsEvery;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getLastModifiedBy(): ?int
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?int $lastModifiedBy): static
    {
        $this->lastModifiedBy = $lastModifiedBy;

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
}
