<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\IntelligentAgentRunUsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Intelligent Agent Run Users Brightspace Data Set lists the users that each intelligent agent run affected and the
 * resulting action. It does not include users that don't meet agent criteria or are part of a practice run.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4528-intelligent-agents-data-sets#intelligent-agent-run-users
 */
#[ORM\Entity(repositoryClass: IntelligentAgentRunUsersRepository::class)]
#[ORM\Table(name: 'D2L_INTELLIGENT_AGENT_RUN_USER')]
#[UniqueConstraint(name: 'D2L_INTELLIGENT_AGENT_RUN_USER_PUK', columns: ['AgentId', 'AgentRunId', 'UserId'])]
final class IntelligentAgentRunUsers
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique intelligent agent identifier.
     */
    #[ORM\Column(name: 'AgentId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $agentId = null;

    /**
     * Unique intelligent agent run identifier.
     */
    #[ORM\Column(name: 'AgentRunId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $agentRunId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier where the agent was run.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The type of action that was taken. Field can be null.
     */
    #[ORM\Column(name: 'ActionTypeName', length: 100, nullable: true)]
    private ?string $actionTypeName = null;

    /**
     * Indicates if the intelligent agent run has errors.
     */
    #[ORM\Column(name: 'ActionHasError', nullable: true)]
    private ?bool $actionHasError = null;

    /**
     * Indicates if the intelligent agent run has info messages.
     */
    #[ORM\Column(name: 'ActionHasInfo', nullable: true)]
    private ?bool $actionHasInfo = null;

    /**
     * Indicates if the intelligent agent run has warnings.
     */
    #[ORM\Column(name: 'ActionHasWarning', nullable: true)]
    private ?bool $actionHasWarning = null;

    /**
     * Indicates if the run should be retried.
     */
    #[ORM\Column(name: 'ShouldRetry', nullable: true)]
    private ?bool $shouldRetry = null;

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

    public function getAgentRunId(): ?string
    {
        return $this->agentRunId;
    }

    public function setAgentRunId(string $agentRunId): static
    {
        $this->agentRunId = $agentRunId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
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

    public function getActionTypeName(): ?string
    {
        return $this->actionTypeName;
    }

    public function setActionTypeName(?string $actionTypeName): static
    {
        $this->actionTypeName = $actionTypeName;

        return $this;
    }

    public function isActionHasError(): ?bool
    {
        return $this->actionHasError;
    }

    public function setActionHasError(?bool $actionHasError): static
    {
        $this->actionHasError = $actionHasError;

        return $this;
    }

    public function isActionHasInfo(): ?bool
    {
        return $this->actionHasInfo;
    }

    public function setActionHasInfo(?bool $actionHasInfo): static
    {
        $this->actionHasInfo = $actionHasInfo;

        return $this;
    }

    public function isActionHasWarning(): ?bool
    {
        return $this->actionHasWarning;
    }

    public function setActionHasWarning(?bool $actionHasWarning): static
    {
        $this->actionHasWarning = $actionHasWarning;

        return $this;
    }

    public function isShouldRetry(): ?bool
    {
        return $this->shouldRetry;
    }

    public function setShouldRetry(?bool $shouldRetry): static
    {
        $this->shouldRetry = $shouldRetry;

        return $this;
    }
}
