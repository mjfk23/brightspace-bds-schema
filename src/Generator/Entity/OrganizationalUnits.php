<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OrganizationalUnitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Organizational Units Brightspace Data Set returns details about all org units within your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4529-organizational-units-data-sets#organizational-units
 */
#[ORM\Entity(repositoryClass: OrganizationalUnitsRepository::class)]
#[ORM\Table(name: 'D2L_ORGANIZATIONAL_UNIT')]
#[UniqueConstraint(name: 'D2L_ORGANIZATIONAL_UNIT_PUK', columns: ['OrgUnitId'])]
final class OrganizationalUnits
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Organization name
     */
    #[ORM\Column(name: 'Organization', length: 100, nullable: true)]
    private ?string $organization = null;

    /**
     * Org unit type. For example: Group, Section, Semester, Department, etc.
     */
    #[ORM\Column(name: 'Type', length: 100, nullable: true)]
    private ?string $type = null;

    /**
     * Org unit name. Field can be null.
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * Org unit code. Field can be null.
     */
    #[ORM\Column(name: 'Code', length: 100, nullable: true)]
    private ?string $code = null;

    /**
     * Availability start date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Availability end date (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * Is the org unit active
     */
    #[ORM\Column(name: 'IsActive', nullable: true)]
    private ?bool $isActive = null;

    /**
     * Org unit create date
     */
    #[ORM\Column(name: 'CreatedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdDate = null;

    /**
     * Is the org unit soft deleted or recycled. Soft delete - the org unit has been soft deleted from the application,
     * but is still present in the database. Recycled - the org unit remains in the recycle bin until removed, at which
     * point it is deleted. The OrgName for recycled or soft deleted org units is SYSTEM. Backfill of historical
     * IsDeleted, DeletedDate, and RecycledDate values is determined by the date/time values in the OrgUnit audit log.
     * Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date the org unit was soft deleted. Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * Date the org unit was recycled. Field can be null.
     */
    #[ORM\Column(name: 'RecycledDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $recycledDate = null;

    /**
     * Indicates the version of the content in the row.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Identifier for the org unit type.
     */
    #[ORM\Column(name: 'OrgUnitTypeId', precision: 10, nullable: true)]
    private ?int $orgUnitTypeId = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): static
    {
        $this->organization = $organization;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

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

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setActive(?bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeImmutable
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeImmutable $createdDate): static
    {
        $this->createdDate = $createdDate;

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

    public function getDeletedDate(): ?\DateTimeImmutable
    {
        return $this->deletedDate;
    }

    public function setDeletedDate(?\DateTimeImmutable $deletedDate): static
    {
        $this->deletedDate = $deletedDate;

        return $this;
    }

    public function getRecycledDate(): ?\DateTimeImmutable
    {
        return $this->recycledDate;
    }

    public function setRecycledDate(?\DateTimeImmutable $recycledDate): static
    {
        $this->recycledDate = $recycledDate;

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

    public function getOrgUnitTypeId(): ?int
    {
        return $this->orgUnitTypeId;
    }

    public function setOrgUnitTypeId(?int $orgUnitTypeId): static
    {
        $this->orgUnitTypeId = $orgUnitTypeId;

        return $this;
    }
}
