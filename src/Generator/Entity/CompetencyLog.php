<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CompetencyLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Competency Log Brightspace Data Set returns data changes to the competency structure.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4754-competency-data-sets#competency-log
 */
#[ORM\Entity(repositoryClass: CompetencyLogRepository::class)]
#[ORM\Table(name: 'D2L_COMPETENCY_LOG')]
#[UniqueConstraint(name: 'D2L_COMPETENCY_LOG_PUK', columns: ['CompetencyLogId'])]
final class CompetencyLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique log identifier
     */
    #[ORM\Column(name: 'CompetencyLogId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $competencyLogId = null;

    /**
     * Log type identifier
     */
    #[ORM\Column(name: 'LogTypeId', precision: 10, nullable: true)]
    private ?int $logTypeId = null;

    /**
     * Name of the log type. Field can be null.
     */
    #[ORM\Column(name: 'LogTypeName', length: 38, nullable: true)]
    private ?string $logTypeName = null;

    /**
     * Identifier for the object that created the change in the competency structure recorded in the log.
     */
    #[ORM\Column(name: 'ObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $objectId = null;

    /**
     * Identifier for the object type that created the change in the competency structure recorded in the log.
     */
    #[ORM\Column(name: 'ObjectTypeId', precision: 10, nullable: true)]
    private ?int $objectTypeId = null;

    /**
     * Name of the object type. Field can be null.
     */
    #[ORM\Column(name: 'ObjectTypeName', length: 36, nullable: true)]
    private ?string $objectTypeName = null;

    /**
     * Version of the object that created the change in the competency structure
     */
    #[ORM\Column(name: 'ObjectVersion', precision: 10, nullable: true)]
    private ?int $objectVersion = null;

    /**
     * Time and date of the entry in the log (UTC).
     */
    #[ORM\Column(name: 'LogDateTime', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $logDateTime = null;

    /**
     * User who modified the competency structure.
     */
    #[ORM\Column(name: 'ModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $modifiedBy = null;

    /**
     * Identifier for the indirect object that created the change in the log. Field can be null.
     */
    #[ORM\Column(name: 'IndirectObjectId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $indirectObjectId = null;

    /**
     * Name of the indirect object type. Field can be null.
     */
    #[ORM\Column(name: 'IndirectObjectTypeName', length: 36, nullable: true)]
    private ?string $indirectObjectTypeName = null;

    /**
     * Identifier of the type of indirect object that created the change in the log. Field can be null.
     */
    #[ORM\Column(name: 'IndirectObjectTypeId', precision: 10, nullable: true)]
    private ?int $indirectObjectTypeId = null;

    /**
     * Version of the object that indirectly created the change in the log. Field can be null.
     */
    #[ORM\Column(name: 'IndirectObjectVersion', precision: 10, nullable: true)]
    private ?int $indirectObjectVersion = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getCompetencyLogId(): ?string
    {
        return $this->competencyLogId;
    }

    public function setCompetencyLogId(string $competencyLogId): static
    {
        $this->competencyLogId = $competencyLogId;

        return $this;
    }

    public function getLogTypeId(): ?int
    {
        return $this->logTypeId;
    }

    public function setLogTypeId(?int $logTypeId): static
    {
        $this->logTypeId = $logTypeId;

        return $this;
    }

    public function getLogTypeName(): ?string
    {
        return $this->logTypeName;
    }

    public function setLogTypeName(?string $logTypeName): static
    {
        $this->logTypeName = $logTypeName;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(?string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getObjectTypeId(): ?int
    {
        return $this->objectTypeId;
    }

    public function setObjectTypeId(?int $objectTypeId): static
    {
        $this->objectTypeId = $objectTypeId;

        return $this;
    }

    public function getObjectTypeName(): ?string
    {
        return $this->objectTypeName;
    }

    public function setObjectTypeName(?string $objectTypeName): static
    {
        $this->objectTypeName = $objectTypeName;

        return $this;
    }

    public function getObjectVersion(): ?int
    {
        return $this->objectVersion;
    }

    public function setObjectVersion(?int $objectVersion): static
    {
        $this->objectVersion = $objectVersion;

        return $this;
    }

    public function getLogDateTime(): ?\DateTimeImmutable
    {
        return $this->logDateTime;
    }

    public function setLogDateTime(?\DateTimeImmutable $logDateTime): static
    {
        $this->logDateTime = $logDateTime;

        return $this;
    }

    public function getModifiedBy(): ?string
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getIndirectObjectId(): ?string
    {
        return $this->indirectObjectId;
    }

    public function setIndirectObjectId(?string $indirectObjectId): static
    {
        $this->indirectObjectId = $indirectObjectId;

        return $this;
    }

    public function getIndirectObjectTypeName(): ?string
    {
        return $this->indirectObjectTypeName;
    }

    public function setIndirectObjectTypeName(?string $indirectObjectTypeName): static
    {
        $this->indirectObjectTypeName = $indirectObjectTypeName;

        return $this;
    }

    public function getIndirectObjectTypeId(): ?int
    {
        return $this->indirectObjectTypeId;
    }

    public function setIndirectObjectTypeId(?int $indirectObjectTypeId): static
    {
        $this->indirectObjectTypeId = $indirectObjectTypeId;

        return $this;
    }

    public function getIndirectObjectVersion(): ?int
    {
        return $this->indirectObjectVersion;
    }

    public function setIndirectObjectVersion(?int $indirectObjectVersion): static
    {
        $this->indirectObjectVersion = $indirectObjectVersion;

        return $this;
    }
}
