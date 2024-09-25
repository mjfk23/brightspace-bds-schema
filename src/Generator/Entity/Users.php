<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Users Brightspace Data Set returns a list of users in your organization. Version 4.10 / 5.4 adds a system user
 * entry with UserId = 0 to this data set. The system user is only included in the full CSV.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#users
 */
#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\Table(name: 'D2L_USER')]
#[UniqueConstraint(name: 'D2L_USER_PUK', columns: ['UserId'])]
final class Users
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * User name
     */
    #[ORM\Column(name: 'UserName', length: 540, nullable: true)]
    private ?string $userName = null;

    /**
     * Org defined ID. Field can be null.
     */
    #[ORM\Column(name: 'OrgDefinedId', length: 512, nullable: true)]
    private ?string $orgDefinedId = null;

    /**
     * User's first name. If a preferred first name is provided, it is used. If not, the legal first name is used.
     */
    #[ORM\Column(name: 'FirstName', length: 128, nullable: true)]
    private ?string $firstName = null;

    /**
     * Middle name. Field can be null.
     */
    #[ORM\Column(name: 'MiddleName', length: 128, nullable: true)]
    private ?string $middleName = null;

    /**
     * User's last name. If a preferred last name is provided, it is used. If not, the legal last name is used.
     */
    #[ORM\Column(name: 'LastName', length: 128, nullable: true)]
    private ?string $lastName = null;

    /**
     * Is user active? Field can be null.
     */
    #[ORM\Column(name: 'IsActive', nullable: true)]
    private ?bool $isActive = null;

    /**
     * Organization name. Field can be null.
     */
    #[ORM\Column(name: 'Organization', length: 512, nullable: true)]
    private ?string $organization = null;

    /**
     * External email address. Field can be null.
     */
    #[ORM\Column(name: 'ExternalEmail', length: 512, nullable: true)]
    private ?string $externalEmail = null;

    /**
     * Date the user was created in the system (UTC). Field can be null.
     */
    #[ORM\Column(name: 'SignupDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $signupDate = null;

    /**
     * Date when the user first logged in to the system (UTC). Field can be null.
     */
    #[ORM\Column(name: 'FirstLoginDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $firstLoginDate = null;

    /**
     * Indicates the version of the content in the row. Field can be null.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * The unique role identifier for the role of the user at the org level. Field can be null.
     */
    #[ORM\Column(name: 'OrgRoleId', precision: 10, nullable: true)]
    private ?int $orgRoleId = null;

    /**
     * The date the user last accessed the system. If the user has never accessed the system, captures the date the user
     * was created.
     */
    #[ORM\Column(name: 'LastAccessed', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastAccessed = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }

    public function getOrgDefinedId(): ?string
    {
        return $this->orgDefinedId;
    }

    public function setOrgDefinedId(?string $orgDefinedId): static
    {
        $this->orgDefinedId = $orgDefinedId;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): static
    {
        $this->middleName = $middleName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

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

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): static
    {
        $this->organization = $organization;

        return $this;
    }

    public function getExternalEmail(): ?string
    {
        return $this->externalEmail;
    }

    public function setExternalEmail(?string $externalEmail): static
    {
        $this->externalEmail = $externalEmail;

        return $this;
    }

    public function getSignupDate(): ?\DateTimeImmutable
    {
        return $this->signupDate;
    }

    public function setSignupDate(?\DateTimeImmutable $signupDate): static
    {
        $this->signupDate = $signupDate;

        return $this;
    }

    public function getFirstLoginDate(): ?\DateTimeImmutable
    {
        return $this->firstLoginDate;
    }

    public function setFirstLoginDate(?\DateTimeImmutable $firstLoginDate): static
    {
        $this->firstLoginDate = $firstLoginDate;

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

    public function getOrgRoleId(): ?int
    {
        return $this->orgRoleId;
    }

    public function setOrgRoleId(?int $orgRoleId): static
    {
        $this->orgRoleId = $orgRoleId;

        return $this;
    }

    public function getLastAccessed(): ?\DateTimeImmutable
    {
        return $this->lastAccessed;
    }

    public function setLastAccessed(?\DateTimeImmutable $lastAccessed): static
    {
        $this->lastAccessed = $lastAccessed;

        return $this;
    }
}
