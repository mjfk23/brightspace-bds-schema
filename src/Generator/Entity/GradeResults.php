<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\GradeResultsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Grade Results Brightspace Data Set returns data from the newest grade objects first.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4527-grades-data-sets#grade-results
 */
#[ORM\Entity(repositoryClass: GradeResultsRepository::class)]
#[ORM\Table(name: 'D2L_GRADE_RESULT')]
#[UniqueConstraint(name: 'D2L_GRADE_RESULT_PUK', columns: ['GradeObjectId', 'OrgUnitId', 'UserId'])]
final class GradeResults
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique grade object identifier
     */
    #[ORM\Column(name: 'GradeObjectId', precision: 10, nullable: false)]
    private ?int $gradeObjectId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Number of points received by user. Field can be null.
     */
    #[ORM\Column(name: 'PointsNumerator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $pointsNumerator = null;

    /**
     * Total number of points possible. Field can be null.
     */
    #[ORM\Column(name: 'PointsDenominator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $pointsDenominator = null;

    /**
     * Number of points received after weight is applied. Field can be null.
     */
    #[ORM\Column(name: 'WeightedNumerator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weightedNumerator = null;

    /**
     * Total number of points possible after weight is applied. Field can be null.
     */
    #[ORM\Column(name: 'WeightedDenominator', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $weightedDenominator = null;

    /**
     * Is grade released. Field can be null. For example, it is null when the grade object is not submitted.
     */
    #[ORM\Column(name: 'IsReleased', nullable: true)]
    private ?bool $isReleased = null;

    /**
     * Is score dropped from final grade
     */
    #[ORM\Column(name: 'IsDropped', nullable: true)]
    private ?bool $isDropped = null;

    /**
     * Last time score was modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User ID of user who last modified the grade object. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Comments. Field can be null.
     */
    #[ORM\Column(name: 'Comments', length: 2000, nullable: true)]
    private ?string $comments = null;

    /**
     * Private comments. Field can be null.
     */
    #[ORM\Column(name: 'PrivateComments', length: 2000, nullable: true)]
    private ?string $privateComments = null;

    /**
     * Is exempt. Field can be null.
     */
    #[ORM\Column(name: 'IsExempt', nullable: true)]
    private ?bool $isExempt = null;

    /**
     * Field can be null.
     */
    #[ORM\Column(name: 'GradeText', length: 100, nullable: true)]
    private ?string $gradeText = null;

    /**
     * Date when the grade was released to the learner (UTC). Field can be null.
     */
    #[ORM\Column(name: 'GradeReleasedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $gradeReleasedDate = null;

    /**
     * Indicates the version of the grade result. Field can be null.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getGradeObjectId(): ?int
    {
        return $this->gradeObjectId;
    }

    public function setGradeObjectId(int $gradeObjectId): static
    {
        $this->gradeObjectId = $gradeObjectId;

        return $this;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function getPointsNumerator(): ?string
    {
        return $this->pointsNumerator;
    }

    public function setPointsNumerator(?string $pointsNumerator): static
    {
        $this->pointsNumerator = $pointsNumerator;

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

    public function getWeightedNumerator(): ?string
    {
        return $this->weightedNumerator;
    }

    public function setWeightedNumerator(?string $weightedNumerator): static
    {
        $this->weightedNumerator = $weightedNumerator;

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

    public function isReleased(): ?bool
    {
        return $this->isReleased;
    }

    public function setReleased(?bool $isReleased): static
    {
        $this->isReleased = $isReleased;

        return $this;
    }

    public function isDropped(): ?bool
    {
        return $this->isDropped;
    }

    public function setDropped(?bool $isDropped): static
    {
        $this->isDropped = $isDropped;

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

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    public function getPrivateComments(): ?string
    {
        return $this->privateComments;
    }

    public function setPrivateComments(?string $privateComments): static
    {
        $this->privateComments = $privateComments;

        return $this;
    }

    public function isExempt(): ?bool
    {
        return $this->isExempt;
    }

    public function setExempt(?bool $isExempt): static
    {
        $this->isExempt = $isExempt;

        return $this;
    }

    public function getGradeText(): ?string
    {
        return $this->gradeText;
    }

    public function setGradeText(?string $gradeText): static
    {
        $this->gradeText = $gradeText;

        return $this;
    }

    public function getGradeReleasedDate(): ?\DateTimeImmutable
    {
        return $this->gradeReleasedDate;
    }

    public function setGradeReleasedDate(?\DateTimeImmutable $gradeReleasedDate): static
    {
        $this->gradeReleasedDate = $gradeReleasedDate;

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
