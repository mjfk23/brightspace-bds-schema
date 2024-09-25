<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CoursePublisherLaunchesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Publisher Launches Brightspace Data Set returns details about course packages launched from the Course
 * Publisher tool.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4524-course-publisher-data-sets#course-publisher-launches
 */
#[ORM\Entity(repositoryClass: CoursePublisherLaunchesRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_PUBLISHER_LAUNCH')]
#[UniqueConstraint(name: 'D2L_COURSE_PUBLISHER_LAUNCH_PUK', columns: ['LaunchId'])]
final class CoursePublisherLaunches
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique course package launch identifier
     */
    #[ORM\Column(name: 'LaunchId', type: Types::GUID, nullable: false)]
    private ?string $launchId = null;

    /**
     * Unique org unit identifier
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique recipient identifier
     */
    #[ORM\Column(name: 'RecipientId', type: Types::GUID, nullable: true)]
    private ?string $recipientId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique role identifier
     */
    #[ORM\Column(name: 'RoleId', precision: 10, nullable: true)]
    private ?int $roleId = null;

    /**
     * Method for launching the course package
     */
    #[ORM\Column(name: 'LaunchMethod', length: 512, nullable: true)]
    private ?string $launchMethod = null;

    /**
     * Unique external user identifier
     */
    #[ORM\Column(name: 'ExternalUserId', length: 512, nullable: true)]
    private ?string $externalUserId = null;

    /**
     * External LMS type used by the recipient
     */
    #[ORM\Column(name: 'ExternalLMSType', length: 512, nullable: true)]
    private ?string $externalLMSType = null;

    /**
     * If the external user is new
     */
    #[ORM\Column(name: 'IsNewUser', nullable: true)]
    private ?bool $isNewUser = null;

    /**
     * Date the course package was last modified (UTC)
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLaunchId(): ?string
    {
        return $this->launchId;
    }

    public function setLaunchId(string $launchId): static
    {
        $this->launchId = $launchId;

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

    public function getRecipientId(): ?string
    {
        return $this->recipientId;
    }

    public function setRecipientId(?string $recipientId): static
    {
        $this->recipientId = $recipientId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): static
    {
        $this->userId = $userId;

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

    public function getLaunchMethod(): ?string
    {
        return $this->launchMethod;
    }

    public function setLaunchMethod(?string $launchMethod): static
    {
        $this->launchMethod = $launchMethod;

        return $this;
    }

    public function getExternalUserId(): ?string
    {
        return $this->externalUserId;
    }

    public function setExternalUserId(?string $externalUserId): static
    {
        $this->externalUserId = $externalUserId;

        return $this;
    }

    public function getExternalLMSType(): ?string
    {
        return $this->externalLMSType;
    }

    public function setExternalLMSType(?string $externalLMSType): static
    {
        $this->externalLMSType = $externalLMSType;

        return $this;
    }

    public function isNewUser(): ?bool
    {
        return $this->isNewUser;
    }

    public function setNewUser(?bool $isNewUser): static
    {
        $this->isNewUser = $isNewUser;

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
