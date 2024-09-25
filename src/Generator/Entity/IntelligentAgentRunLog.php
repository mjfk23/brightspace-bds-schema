<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\IntelligentAgentRunLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Intelligent Agent Run Log Brightspace Data Set lists all the times, including practice runs, each intelligent
 * agent has run in your organization. This data set captures data from November 2020 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4528-intelligent-agents-data-sets#intelligent-agent-run-log
 */
#[ORM\Entity(repositoryClass: IntelligentAgentRunLogRepository::class)]
#[ORM\Table(name: 'D2L_INTELLIGENT_AGENT_RUN_LOG')]
#[UniqueConstraint(name: 'D2L_INTELLIGENT_AGENT_RUN_LOG_PUK', columns: ['AgentRunId'])]
final class IntelligentAgentRunLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique intelligent agent identifier.
     */
    #[ORM\Column(name: 'AgentId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $agentId = null;

    /**
     * Unique intelligent agent run identifier.
     */
    #[ORM\Column(name: 'AgentRunId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $agentRunId = null;

    /**
     * Indicates if it is a practice run.
     */
    #[ORM\Column(name: 'IsPracticeRun', nullable: true)]
    private ?bool $isPracticeRun = null;

    /**
     * Indicates if it was an unscheduled run.
     */
    #[ORM\Column(name: 'IsRunNow', nullable: true)]
    private ?bool $isRunNow = null;

    /**
     * Count of the number of users affected by this run.
     */
    #[ORM\Column(name: 'NumUsers', precision: 10, nullable: true)]
    private ?int $numUsers = null;

    /**
     * The number of users where the action produced errors.
     */
    #[ORM\Column(name: 'NumUsersWithErrors', precision: 10, nullable: true)]
    private ?int $numUsersWithErrors = null;

    /**
     * The number of users where the action produced informational messages.
     */
    #[ORM\Column(name: 'NumUsersWithInfos', precision: 10, nullable: true)]
    private ?int $numUsersWithInfos = null;

    /**
     * The number of users where the action produced warning messages.
     */
    #[ORM\Column(name: 'NumUsersWithWarnings', precision: 10, nullable: true)]
    private ?int $numUsersWithWarnings = null;

    /**
     * Unique identifier of the user who ran the agent. 0 for system.
     */
    #[ORM\Column(name: 'RunUserId', precision: 10, nullable: true)]
    private ?int $runUserId = null;

    /**
     * The date the run occurred (UTC).
     */
    #[ORM\Column(name: 'RunDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $runDate = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAgentId(): ?string
    {
        return $this->agentId;
    }

    public function setAgentId(?string $agentId): static
    {
        $this->agentId = $agentId;

        return $this;
    }

    public function getAgentRunId(): ?string
    {
        return $this->agentRunId;
    }

    public function setAgentRunId(string $agentRunId): static
    {
        $this->agentRunId = $agentRunId;

        return $this;
    }

    public function isPracticeRun(): ?bool
    {
        return $this->isPracticeRun;
    }

    public function setPracticeRun(?bool $isPracticeRun): static
    {
        $this->isPracticeRun = $isPracticeRun;

        return $this;
    }

    public function isRunNow(): ?bool
    {
        return $this->isRunNow;
    }

    public function setRunNow(?bool $isRunNow): static
    {
        $this->isRunNow = $isRunNow;

        return $this;
    }

    public function getNumUsers(): ?int
    {
        return $this->numUsers;
    }

    public function setNumUsers(?int $numUsers): static
    {
        $this->numUsers = $numUsers;

        return $this;
    }

    public function getNumUsersWithErrors(): ?int
    {
        return $this->numUsersWithErrors;
    }

    public function setNumUsersWithErrors(?int $numUsersWithErrors): static
    {
        $this->numUsersWithErrors = $numUsersWithErrors;

        return $this;
    }

    public function getNumUsersWithInfos(): ?int
    {
        return $this->numUsersWithInfos;
    }

    public function setNumUsersWithInfos(?int $numUsersWithInfos): static
    {
        $this->numUsersWithInfos = $numUsersWithInfos;

        return $this;
    }

    public function getNumUsersWithWarnings(): ?int
    {
        return $this->numUsersWithWarnings;
    }

    public function setNumUsersWithWarnings(?int $numUsersWithWarnings): static
    {
        $this->numUsersWithWarnings = $numUsersWithWarnings;

        return $this;
    }

    public function getRunUserId(): ?int
    {
        return $this->runUserId;
    }

    public function setRunUserId(?int $runUserId): static
    {
        $this->runUserId = $runUserId;

        return $this;
    }

    public function getRunDate(): ?\DateTimeImmutable
    {
        return $this->runDate;
    }

    public function setRunDate(?\DateTimeImmutable $runDate): static
    {
        $this->runDate = $runDate;

        return $this;
    }
}
