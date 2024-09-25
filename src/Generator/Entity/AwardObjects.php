<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\AwardObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Award Objects Brightspace Data Set returns details on all awards that were created anywhere in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4520-awards-data-sets#award-objects
 */
#[ORM\Entity(repositoryClass: AwardObjectsRepository::class)]
#[ORM\Table(name: 'D2L_AWARD_OBJECT')]
#[UniqueConstraint(name: 'D2L_AWARD_OBJECT_PUK', columns: ['AwardId'])]
final class AwardObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique award identifier
     */
    #[ORM\Column(name: 'AwardId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $awardId = null;

    /**
     * Award name
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Award type identifier
     */
    #[ORM\Column(name: 'AwardTypeId', precision: 10, nullable: true)]
    private ?int $awardTypeId = null;

    /**
     * Award type (Certificate or Badge)
     */
    #[ORM\Column(name: 'Type', length: 256, nullable: true)]
    private ?string $type = null;

    /**
     * Description of the award.
     */
    #[ORM\Column(name: 'Description', length: 1024, nullable: true)]
    private ?string $description = null;

    /**
     * Calculation type for expiry of award
     */
    #[ORM\Column(name: 'ExpiryCalculationType', length: 256, nullable: true)]
    private ?string $expiryCalculationType = null;

    /**
     * Time unit for expiry notification (such as days)
     */
    #[ORM\Column(name: 'ExpiryNotificationType', length: 256, nullable: true)]
    private ?string $expiryNotificationType = null;

    /**
     * Date when the award is scheduled to expire. Can be NULL if the award never expires or has a relative expiry date.
     */
    #[ORM\Column(name: 'ExpiryDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $expiryDate = null;

    /**
     * Indicates the location where the award image is stored. Field can be null.
     */
    #[ORM\Column(name: 'ImagePath', length: 2000, nullable: true)]
    private ?string $imagePath = null;

    /**
     * User who created the award
     */
    #[ORM\Column(name: 'CreatedByUserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $createdByUserId = null;

    /**
     * Date award was last changed (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Indicates whether the award is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the criteria necessary to issue the award. Field can be null.
     */
    #[ORM\Column(name: 'Criteria', length: 2000, nullable: true)]
    private ?string $criteria = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getAwardId(): ?string
    {
        return $this->awardId;
    }

    public function setAwardId(string $awardId): static
    {
        $this->awardId = $awardId;

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

    public function getAwardTypeId(): ?int
    {
        return $this->awardTypeId;
    }

    public function setAwardTypeId(?int $awardTypeId): static
    {
        $this->awardTypeId = $awardTypeId;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getExpiryCalculationType(): ?string
    {
        return $this->expiryCalculationType;
    }

    public function setExpiryCalculationType(?string $expiryCalculationType): static
    {
        $this->expiryCalculationType = $expiryCalculationType;

        return $this;
    }

    public function getExpiryNotificationType(): ?string
    {
        return $this->expiryNotificationType;
    }

    public function setExpiryNotificationType(?string $expiryNotificationType): static
    {
        $this->expiryNotificationType = $expiryNotificationType;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeImmutable
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?\DateTimeImmutable $expiryDate): static
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getCreatedByUserId(): ?string
    {
        return $this->createdByUserId;
    }

    public function setCreatedByUserId(?string $createdByUserId): static
    {
        $this->createdByUserId = $createdByUserId;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getCriteria(): ?string
    {
        return $this->criteria;
    }

    public function setCriteria(?string $criteria): static
    {
        $this->criteria = $criteria;

        return $this;
    }
}
