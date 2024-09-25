<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\PortfolioEvidenceCategoriesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Portfolio Evidence Categories Brightspace Data Set details the one or many categories that are mapped to each
 * piece of evidence in the Portfolios in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4530-portfolio-data-sets#portfolio-evidence-categories
 */
#[ORM\Entity(repositoryClass: PortfolioEvidenceCategoriesRepository::class)]
#[ORM\Table(name: 'D2L_PORTFOLIO_EVIDENCE_CATEGORY')]
#[UniqueConstraint(name: 'D2L_PORTFOLIO_EVIDENCE_CATEGORY_PUK', columns: ['CategoryId', 'EvidenceId', 'Group'])]
final class PortfolioEvidenceCategories
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * The identifier for the category
     */
    #[ORM\Column(name: 'CategoryId', type: Types::GUID, nullable: false)]
    private ?string $categoryId = null;

    /**
     * The identifier for the evidence
     */
    #[ORM\Column(name: 'EvidenceId', type: Types::GUID, nullable: false)]
    private ?string $evidenceId = null;

    /**
     * Indicates how the category was linked to the evidence. By the learner or instructor.
     */
    #[ORM\Column(name: 'Group', length: 60, nullable: false)]
    private ?string $group = null;

    /**
     * Indicates whether the link between the category and the evidence is deleted
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date when the portfolio category was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User who last modified the portfolio category
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

    public function getEvidenceId(): ?string
    {
        return $this->evidenceId;
    }

    public function setEvidenceId(string $evidenceId): static
    {
        $this->evidenceId = $evidenceId;

        return $this;
    }

    public function getGroup(): ?string
    {
        return $this->group;
    }

    public function setGroup(string $group): static
    {
        $this->group = $group;

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
