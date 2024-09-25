<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SurveyAttemptsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Survey Attempts Brightspace Data Set returns details for each user survey attempt for all your org units. This
 * data set includes completed survey attempts and in-progress survey attempts.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4538-surveys-data-sets#survey-attempts
 */
#[ORM\Entity(repositoryClass: SurveyAttemptsRepository::class)]
#[ORM\Table(name: 'D2L_SURVEY_ATTEMPT')]
#[UniqueConstraint(name: 'D2L_SURVEY_ATTEMPT_PUK', columns: ['AttemptId'])]
final class SurveyAttempts
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique attempt identifier
     */
    #[ORM\Column(name: 'AttemptId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $attemptId = null;

    /**
     * Unique survey identifier.
     */
    #[ORM\Column(name: 'SurveyId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $surveyId = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Attempt number for the survey.
     */
    #[ORM\Column(name: 'AttemptNumber', precision: 10, nullable: true)]
    private ?int $attemptNumber = null;

    /**
     * Survey attempt start time (UTC).
     */
    #[ORM\Column(name: 'TimeStarted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeStarted = null;

    /**
     * Survey attempt complete time (UTC). Field can be null.
     */
    #[ORM\Column(name: 'TimeCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $timeCompleted = null;

    /**
     * Org unit identifier where the survey was attempted from. Field can be null.
     */
    #[ORM\Column(name: 'AttemptedFromOrgUnitId', precision: 10, nullable: true)]
    private ?int $attemptedFromOrgUnitId = null;

    /**
     * Number of previous times a learner has attempted the survey. Field can be null.
     */
    #[ORM\Column(name: 'OldAttemptNumber', precision: 10, nullable: true)]
    private ?int $oldAttemptNumber = null;

    /**
     * Indicates that the survey attempt is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

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

    public function getAttemptId(): ?string
    {
        return $this->attemptId;
    }

    public function setAttemptId(string $attemptId): static
    {
        $this->attemptId = $attemptId;

        return $this;
    }

    public function getSurveyId(): ?string
    {
        return $this->surveyId;
    }

    public function setSurveyId(?string $surveyId): static
    {
        $this->surveyId = $surveyId;

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

    public function getAttemptNumber(): ?int
    {
        return $this->attemptNumber;
    }

    public function setAttemptNumber(?int $attemptNumber): static
    {
        $this->attemptNumber = $attemptNumber;

        return $this;
    }

    public function getTimeStarted(): ?\DateTimeImmutable
    {
        return $this->timeStarted;
    }

    public function setTimeStarted(?\DateTimeImmutable $timeStarted): static
    {
        $this->timeStarted = $timeStarted;

        return $this;
    }

    public function getTimeCompleted(): ?\DateTimeImmutable
    {
        return $this->timeCompleted;
    }

    public function setTimeCompleted(?\DateTimeImmutable $timeCompleted): static
    {
        $this->timeCompleted = $timeCompleted;

        return $this;
    }

    public function getAttemptedFromOrgUnitId(): ?int
    {
        return $this->attemptedFromOrgUnitId;
    }

    public function setAttemptedFromOrgUnitId(?int $attemptedFromOrgUnitId): static
    {
        $this->attemptedFromOrgUnitId = $attemptedFromOrgUnitId;

        return $this;
    }

    public function getOldAttemptNumber(): ?int
    {
        return $this->oldAttemptNumber;
    }

    public function setOldAttemptNumber(?int $oldAttemptNumber): static
    {
        $this->oldAttemptNumber = $oldAttemptNumber;

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
