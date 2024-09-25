<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradeObjectsLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Objects Log Brightspace Data Set returns a log of all changes to grades for each applicable user in the
 * organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-objects-log
 */
#[ORM\Entity(repositoryClass: GradeObjectsLogRepository::class)]
#[ORM\Table(name: 'D2L_GRADE_OBJECT_LOG')]
#[UniqueConstraint(name: 'D2L_GRADE_OBJECT_LOG_PUK', columns: ['LogId'])]
final class GradeObjectsLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique grade object log identifier.
     */
    #[ORM\Column(name: 'LogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $logId = null;

    /**
     * Name of the action. Field can be null.
     */
    #[ORM\Column(name: 'Name', length: 100, nullable: true)]
    private ?string $name = null;

    /**
     * Grade object identifier.
     */
    #[ORM\Column(name: 'GradeObjectId', precision: 10, nullable: true)]
    private ?int $gradeObjectId = null;

    /**
     * Unique identifier of the user who completed the action.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Value of the grade. Field can be null.
     */
    #[ORM\Column(name: 'GradeSymbolString', length: 100, nullable: true)]
    private ?string $gradeSymbolString = null;

    /**
     * Total number of points possible. Field can be null.
     */
    #[ORM\Column(name: 'PointsDenominator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $pointsDenominator = null;

    /**
     * Number of points received by user. Field can be null.
     */
    #[ORM\Column(name: 'PointsNumerator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $pointsNumerator = null;

    /**
     * Total number of points possible after weight is applied. Field can be null.
     */
    #[ORM\Column(name: 'WeightedDenominator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weightedDenominator = null;

    /**
     * Number of points received after weight is applied. Field can be null.
     */
    #[ORM\Column(name: 'WeightedNumerator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weightedNumerator = null;

    /**
     * Date and time the action was made.
     */
    #[ORM\Column(name: 'Modified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $modified = null;

    /**
     * User who modified the grade object. Field can be null if done automatically.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getGradeObjectId(): ?int
    {
        return $this->gradeObjectId;
    }

    public function setGradeObjectId(?int $gradeObjectId): static
    {
        $this->gradeObjectId = $gradeObjectId;

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

    public function getGradeSymbolString(): ?string
    {
        return $this->gradeSymbolString;
    }

    public function setGradeSymbolString(?string $gradeSymbolString): static
    {
        $this->gradeSymbolString = $gradeSymbolString;

        return $this;
    }

    public function getPointsDenominator(): ?string
    {
        return $this->pointsDenominator;
    }

    public function setPointsDenominator(?string $pointsDenominator): static
    {
        $this->pointsDenominator = $pointsDenominator;

        return $this;
    }

    public function getPointsNumerator(): ?string
    {
        return $this->pointsNumerator;
    }

    public function setPointsNumerator(?string $pointsNumerator): static
    {
        $this->pointsNumerator = $pointsNumerator;

        return $this;
    }

    public function getWeightedDenominator(): ?string
    {
        return $this->weightedDenominator;
    }

    public function setWeightedDenominator(?string $weightedDenominator): static
    {
        $this->weightedDenominator = $weightedDenominator;

        return $this;
    }

    public function getWeightedNumerator(): ?string
    {
        return $this->weightedNumerator;
    }

    public function setWeightedNumerator(?string $weightedNumerator): static
    {
        $this->weightedNumerator = $weightedNumerator;

        return $this;
    }

    public function getModified(): ?\DateTimeImmutable
    {
        return $this->modified;
    }

    public function setModified(?\DateTimeImmutable $modified): static
    {
        $this->modified = $modified;

        return $this;
    }

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }
}
