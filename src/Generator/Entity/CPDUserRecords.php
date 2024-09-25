<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CPDUserRecordsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The CPD User Records Brightspace Data Set returns a list of all CPD records created by users in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26020-continuous-professional-development-cpd-data-sets#cpd-user-records
 */
#[ORM\Entity(repositoryClass: CPDUserRecordsRepository::class)]
#[ORM\Table(name: 'D2L_CPD_USER_RECORD')]
#[UniqueConstraint(name: 'D2L_CPD_USER_RECORD_PUK', columns: ['RecordId'])]
final class CPDUserRecords
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each user record.
     */
    #[ORM\Column(name: 'RecordId', precision: 10, nullable: false)]
    private ?int $recordId = null;

    /**
     * The name of the user record.
     */
    #[ORM\Column(name: 'RecordName', length: 512, nullable: true)]
    private ?string $recordName = null;

    /**
     * The state of the record: Published or Draft.
     */
    #[ORM\Column(name: 'State', length: 100, nullable: true)]
    private ?string $state = null;

    /**
     * Unique user identifier for the owner of the record.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * The ID of the record's selected subject.
     */
    #[ORM\Column(name: 'Subject', precision: 10, nullable: true)]
    private ?int $subject = null;

    /**
     * The ID of the record's selected method.
     */
    #[ORM\Column(name: 'Method', precision: 10, nullable: true)]
    private ?int $method = null;

    /**
     * Number of minutes credited by the record.
     */
    #[ORM\Column(name: 'CreditMinutes', precision: 10, nullable: true)]
    private ?int $creditMinutes = null;

    /**
     * Comma delimited list of evidence file names.
     */
    #[ORM\Column(name: 'Evidence', length: 4000, nullable: true)]
    private ?string $evidence = null;

    /**
     * The type of the record: Structured or Unstructured.
     */
    #[ORM\Column(name: 'Type', length: 100, nullable: true)]
    private ?string $type = null;

    /**
     * The grade value of the associated award. Field can be null.
     */
    #[ORM\Column(name: 'Grade', type: Types::DECIMAL, precision: 4, scale: 3, nullable: true)]
    private ?string $grade = null;

    /**
     * The user provided date that the record was completed.
     */
    #[ORM\Column(name: 'DateCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateCompleted = null;

    /**
     * The date and time (UTC) the record was added or last updated. Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * The date and time (UTC) the method was deleted. Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRecordId(): ?int
    {
        return $this->recordId;
    }

    public function setRecordId(int $recordId): static
    {
        $this->recordId = $recordId;

        return $this;
    }

    public function getRecordName(): ?string
    {
        return $this->recordName;
    }

    public function setRecordName(?string $recordName): static
    {
        $this->recordName = $recordName;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

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

    public function getSubject(): ?int
    {
        return $this->subject;
    }

    public function setSubject(?int $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMethod(): ?int
    {
        return $this->method;
    }

    public function setMethod(?int $method): static
    {
        $this->method = $method;

        return $this;
    }

    public function getCreditMinutes(): ?int
    {
        return $this->creditMinutes;
    }

    public function setCreditMinutes(?int $creditMinutes): static
    {
        $this->creditMinutes = $creditMinutes;

        return $this;
    }

    public function getEvidence(): ?string
    {
        return $this->evidence;
    }

    public function setEvidence(?string $evidence): static
    {
        $this->evidence = $evidence;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(?string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getDateCompleted(): ?\DateTimeImmutable
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?\DateTimeImmutable $dateCompleted): static
    {
        $this->dateCompleted = $dateCompleted;

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

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

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
