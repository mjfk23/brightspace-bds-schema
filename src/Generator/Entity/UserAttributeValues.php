<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\UserAttributeValuesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The User Attribute Values Brightspace Data Set returns a list of all values for all defined user attributes for each
 * user in your organization. If no user attributes are defined for your organization, the data set will not generate.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#user-attribute-values
 */
#[ORM\Entity(repositoryClass: UserAttributeValuesRepository::class)]
#[ORM\Table(name: 'D2L_USER_ATTRIBUTE_VALUE')]
#[UniqueConstraint(name: 'D2L_USER_ATTRIBUTE_VALUE_PUK', columns: ['UserId', 'AttributeId'])]
final class UserAttributeValues
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the user who the attribute is assigned to.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique identifier of the attribute.
     */
    #[ORM\Column(name: 'AttributeId', length: 256, nullable: false)]
    private ?string $attributeId = null;

    /**
     * Value or list of values assigned to the user for the given attribute. Formatted as comma-separated values (CSV).
     */
    #[ORM\Column(name: 'Value', length: 4000, nullable: true)]
    private ?string $value = null;

    /**
     * Date the attribute value was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the attribute value.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

    /**
     * Indicates if the attribute value is deleted (TRUE - 1) or not (FALSE - 0).
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which row occurred first.
     */
    #[ORM\Column(name: 'Version', precision: 10, nullable: true)]
    private ?int $version = null;

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

    public function getAttributeId(): ?string
    {
        return $this->attributeId;
    }

    public function setAttributeId(string $attributeId): static
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
    {
        $this->value = $value;

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

    public function getModifiedBy(): ?int
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?int $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

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

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): static
    {
        $this->version = $version;

        return $this;
    }
}
