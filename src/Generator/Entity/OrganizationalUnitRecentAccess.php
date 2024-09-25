<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\OrganizationalUnitRecentAccessRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Organizational Unit Recent Access Brightspace Data Set returns a list of users, corresponding org units, and the
 * time stamp when they most recently accessed the org unit.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4529-organizational-units-data-sets#organizational-unit-recent-access
 */
#[ORM\Entity(repositoryClass: OrganizationalUnitRecentAccessRepository::class)]
#[ORM\Table(name: 'D2L_ORGANIZATIONAL_UNIT_RECENT_ACCESS')]
#[UniqueConstraint(name: 'D2L_ORGANIZATIONAL_UNIT_RECENT_ACCESS_PUK', columns: ['OrgUnitId', 'UserId'])]
final class OrganizationalUnitRecentAccess
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
     * User Id of the user that accessed the org unit
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Date the org was last accessed (UTC).
     */
    #[ORM\Column(name: 'LastAccessedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastAccessedDate = null;

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getLastAccessedDate(): ?\DateTimeImmutable
    {
        return $this->lastAccessedDate;
    }

    public function setLastAccessedDate(?\DateTimeImmutable $lastAccessedDate): static
    {
        $this->lastAccessedDate = $lastAccessedDate;

        return $this;
    }
}
