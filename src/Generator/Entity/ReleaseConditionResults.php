<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ReleaseConditionResultsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Release Condition Results Brightspace Data Set returns all the release condition results and whether they have
 * been met for applicable users in the organization. These are the resulting actions that occur when pre-requisites are
 * met.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4533-release-conditions-data-sets#release-condition-results
 */
#[ORM\Entity(repositoryClass: ReleaseConditionResultsRepository::class)]
#[ORM\Table(name: 'D2L_RELEASE_CONDITION_RESULT')]
#[UniqueConstraint(name: 'D2L_RELEASE_CONDITION_RESULT_PUK', columns: ['ResultId', 'UserId'])]
final class ReleaseConditionResults
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique result identifier.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: false)]
    private ?int $resultId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Indicates whether the result has been met or not met by the user.
     */
    #[ORM\Column(name: 'Met', length: 14, nullable: true)]
    private ?string $met = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getResultId(): ?int
    {
        return $this->resultId;
    }

    public function setResultId(int $resultId): static
    {
        $this->resultId = $resultId;

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

    public function getMet(): ?string
    {
        return $this->met;
    }

    public function setMet(?string $met): static
    {
        $this->met = $met;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
