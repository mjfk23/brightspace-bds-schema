<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\PreRequisiteConditionsMetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The PreRequisite Conditions Met Brightspace Data Set returns all the prerequisite conditions that have been met for
 * applicable users in the organization. The PreRequisite Conditions Met Brightspace Data Set contains data from 1
 * January 2021 onwards and adheres to the default system limit of 150 million rows of the most recent data.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4533-release-conditions-data-sets#prerequisite-conditions-met
 */
#[ORM\Entity(repositoryClass: PreRequisiteConditionsMetRepository::class)]
#[ORM\Table(name: 'D2L_PREREQUISITE_CONDITION_MET')]
#[UniqueConstraint(name: 'D2L_PREREQUISITE_CONDITION_MET_PUK', columns: ['PreRequisiteId', 'UserId'])]
final class PreRequisiteConditionsMet
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique prerequisite identifier.
     */
    #[ORM\Column(name: 'PreRequisiteId', precision: 10, nullable: false)]
    private ?int $preRequisiteId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Date the prerequisite condition was met (UTC). Field can be null
     */
    #[ORM\Column(name: 'DateMet', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateMet = null;

    /**
     * The action that occurred: Met or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 14, nullable: true)]
    private ?string $action = null;

    /**
     * The date and time when the condition was Met or Deleted. For Met conditions, this matches the DateMet column.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getPreRequisiteId(): ?int
    {
        return $this->preRequisiteId;
    }

    public function setPreRequisiteId(int $preRequisiteId): static
    {
        $this->preRequisiteId = $preRequisiteId;

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

    public function getDateMet(): ?\DateTimeImmutable
    {
        return $this->dateMet;
    }

    public function setDateMet(?\DateTimeImmutable $dateMet): static
    {
        $this->dateMet = $dateMet;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): static
    {
        $this->action = $action;

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
