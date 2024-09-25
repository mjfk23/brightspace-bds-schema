<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ContentUserCompletionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Content User Completion Brightspace Data Set returns information about specific user's completion of content
 * topics. The data set is limited to 3 years of data (all of the previous two calendar years and the current calendar
 * year to date).
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4713-content-data-sets#content-user-completion
 */
#[ORM\Entity(repositoryClass: ContentUserCompletionRepository::class)]
#[ORM\Table(name: 'D2L_CONTENT_USER_COMPLETION')]
#[UniqueConstraint(name: 'D2L_CONTENT_USER_COMPLETION_PUK', columns: ['ContentObjectId', 'UserId'])]
final class ContentUserCompletion
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the content
     */
    #[ORM\Column(name: 'ContentObjectId', precision: 10, nullable: false)]
    private ?int $contentObjectId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Date content was completed (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DateCompleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateCompleted = null;

    /**
     * Date the content user completion was last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getContentObjectId(): ?int
    {
        return $this->contentObjectId;
    }

    public function setContentObjectId(int $contentObjectId): static
    {
        $this->contentObjectId = $contentObjectId;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }
}
