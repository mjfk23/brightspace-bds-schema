<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\PortfolioCategoriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Portfolio Categories Brightspace Data Set details the categories that have been created in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4530-portfolio-data-sets#portfolio-categories
 */
#[ORM\Entity(repositoryClass: PortfolioCategoriesRepository::class)]
#[ORM\Table(name: 'D2L_PORTFOLIO_CATEGORY')]
#[UniqueConstraint(name: 'D2L_PORTFOLIO_CATEGORY_PUK', columns: ['CategoryId'])]
final class PortfolioCategories
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique category identifier
     */
    #[ORM\Column(name: 'CategoryId', type: Types::GUID, nullable: false)]
    private ?string $categoryId = null;

    /**
     * Unique org unit identifier. Field can be null
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Portfolio category name.
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Indicates the category is retired and therefore cannot be used.
     */
    #[ORM\Column(name: 'IsRetired', nullable: true)]
    private ?bool $isRetired = null;

    /**
     * Indicates if the portfolio category is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date when the portfolio category was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the portfolio category.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    public function setCategoryId(string $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function isRetired(): ?bool
    {
        return $this->isRetired;
    }

    public function setRetired(?bool $isRetired): static
    {
        $this->isRetired = $isRetired;

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
}
