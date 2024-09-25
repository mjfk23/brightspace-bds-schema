<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ChecklistCompletionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Checklist Completions Brightspace Data Set returns the completion status of each checklist item. Note: The
 * IsCompleted column is set to TRUE in all data prior to 20.23.8.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4523-checklist-data-sets#checklist-completions
 */
#[ORM\Entity(repositoryClass: ChecklistCompletionsRepository::class)]
#[ORM\Table(name: 'D2L_CHECKLIST_COMPLETION')]
#[UniqueConstraint(name: 'D2L_CHECKLIST_COMPLETION_PUK', columns: ['UserId', 'ItemId'])]
final class ChecklistCompletions
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user Identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Date the checklist item was last completed (UTC).
     */
    #[ORM\Column(name: 'DateCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateCompleted = null;

    /**
     * Unique checklist item identifier.
     */
    #[ORM\Column(name: 'ItemId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $itemId = null;

    /**
     * Date the content user completion was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Indicates whether the checklist item is currently complete or incomplete in the user's copy of the checklist.
     */
    #[ORM\Column(name: 'IsCompleted', nullable: true)]
    private ?bool $isCompleted = null;

    /**
     * Date the completion status was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * User who deleted the completion status. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    /**
     * Indicates the version of the completion status.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

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

    public function getDateCompleted(): ?\DateTimeImmutable
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?\DateTimeImmutable $dateCompleted): static
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(string $itemId): static
    {
        $this->itemId = $itemId;

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

    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setCompleted(?bool $isCompleted): static
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }

    public function getDateDeleted(): ?\DateTimeImmutable
    {
        return $this->dateDeleted;
    }

    public function setDateDeleted(?\DateTimeImmutable $dateDeleted): static
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    public function getDeletedBy(): ?int
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?int $deletedBy): static
    {
        $this->deletedBy = $deletedBy;

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
