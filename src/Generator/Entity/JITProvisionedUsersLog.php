<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\JITProvisionedUsersLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The JIT Provisioned Users Log Brightspace Data Set returns information on any issues or failures with the
 * provisioning of users via Just-In-Time User Provisioning. Each row in the data set represents a log of action (for
 * example, created or updated) taken on users provisioned via Just-In-Time User Provisioning. It provides information
 * about the users, the type of their provider, the Id of the provider, date, and time that the users were provisioned
 * (UTC).
 *
 * @see https://community.d2l.com/brightspace/kb/articles/5782-jit-provisioning-data-sets#jit-provisioned-users-log
 */
#[ORM\Entity(repositoryClass: JITProvisionedUsersLogRepository::class)]
#[ORM\Table(name: 'D2L_JIT_PROVISIONED_USER_LOG')]
#[UniqueConstraint(name: 'D2L_JIT_PROVISIONED_USER_LOG_PUK', columns: ['UserId', 'Timestamp'])]
final class JITProvisionedUsersLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the user.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * The Brightspace field used to map the user with the Identity Provider (For example: "Username", "Email Address",
     * "Org Defined Id").
     */
    #[ORM\Column(name: 'MappingField', length: 64, nullable: true)]
    private ?string $mappingField = null;

    /**
     * The value of the Brightspace field used to map the user with the Identity Provider.
     */
    #[ORM\Column(name: 'MappingFieldValue', length: 540, nullable: true)]
    private ?string $mappingFieldValue = null;

    /**
     * The type of provider that provisioned the user (For example: "SAML").
     */
    #[ORM\Column(name: 'ProviderType', length: 64, nullable: true)]
    private ?string $providerType = null;

    /**
     * The Id of the provider that provisioned the user.
     */
    #[ORM\Column(name: 'ProviderId', length: 2048, nullable: true)]
    private ?string $providerId = null;

    /**
     * The Org level Role that the user was provisioned as.
     */
    #[ORM\Column(name: 'RoleId', precision: 10, nullable: true)]
    private ?int $roleId = null;

    /**
     * Date and time that the user was provisioned (UTC).
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $timestamp = null;

    /**
     * Indicates the provisioning action taken on the user (For example:: "Created", "Updated").
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

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

    public function getMappingField(): ?string
    {
        return $this->mappingField;
    }

    public function setMappingField(?string $mappingField): static
    {
        $this->mappingField = $mappingField;

        return $this;
    }

    public function getMappingFieldValue(): ?string
    {
        return $this->mappingFieldValue;
    }

    public function setMappingFieldValue(?string $mappingFieldValue): static
    {
        $this->mappingFieldValue = $mappingFieldValue;

        return $this;
    }

    public function getProviderType(): ?string
    {
        return $this->providerType;
    }

    public function setProviderType(?string $providerType): static
    {
        $this->providerType = $providerType;

        return $this;
    }

    public function getProviderId(): ?string
    {
        return $this->providerId;
    }

    public function setProviderId(?string $providerId): static
    {
        $this->providerId = $providerId;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function setRoleId(?int $roleId): static
    {
        $this->roleId = $roleId;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

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
}
