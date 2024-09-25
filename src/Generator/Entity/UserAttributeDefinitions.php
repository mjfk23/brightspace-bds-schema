<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\UserAttributeDefinitionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The User Attribute Definitions Brightspace Data Set returns a list of all defined user attributes in your
 * organization. If no user attributes are defined for your organization, the data set will not generate.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4740-users-data-sets#user-attribute-definitions
 */
#[ORM\Entity(repositoryClass: UserAttributeDefinitionsRepository::class)]
#[ORM\Table(name: 'D2L_USER_ATTRIBUTE_DEFINITION')]
#[UniqueConstraint(name: 'D2L_USER_ATTRIBUTE_DEFINITION_PUK', columns: ['AttributeId'])]
final class UserAttributeDefinitions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the attribute.
     */
    #[ORM\Column(name: 'AttributeId', length: 256, nullable: false)]
    private ?string $attributeId = null;

    /**
     * Display name for the attribute.
     */
    #[ORM\Column(name: 'Name', length: 256, nullable: true)]
    private ?string $name = null;

    /**
     * Indicates the type of data stored in the attribute. Can be one of "string", "date", "user", or "org_unit".
     */
    #[ORM\Column(name: 'Type', length: 16, nullable: true)]
    private ?string $type = null;

    /**
     * Indicates if multiple values are allowed for the attribute (TRUE - 1) or not (FALSE - 0).
     */
    #[ORM\Column(name: 'AllowMultiple', nullable: true)]
    private ?bool $allowMultiple = null;

    /**
     * Indicates if the attribute is a default (TRUE - 1) or a custom attribute (FALSE - 0).
     */
    #[ORM\Column(name: 'IsDefault', nullable: true)]
    private ?bool $isDefault = null;

    /**
     * Date the attribute definition was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the attribute definition.
     */
    #[ORM\Column(name: 'ModifiedBy', precision: 10, nullable: true)]
    private ?int $modifiedBy = null;

    /**
     * Indicates if the attribute definition is deleted (TRUE - 1) or not (FALSE - 0).
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function isAllowMultiple(): ?bool
    {
        return $this->allowMultiple;
    }

    public function setAllowMultiple(?bool $allowMultiple): static
    {
        $this->allowMultiple = $allowMultiple;

        return $this;
    }

    public function isDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setDefault(?bool $isDefault): static
    {
        $this->isDefault = $isDefault;

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
