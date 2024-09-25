<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CoursePublisherRecipientsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Course Publisher Recipients Brightspace Data Set returns details about course package recipients in the Course
 * Publisher tool.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4524-course-publisher-data-sets#course-publisher-recipients
 */
#[ORM\Entity(repositoryClass: CoursePublisherRecipientsRepository::class)]
#[ORM\Table(name: 'D2L_COURSE_PUBLISHER_RECIPIENT')]
#[UniqueConstraint(name: 'D2L_COURSE_PUBLISHER_RECIPIENT_PUK', columns: ['RecipientID'])]
final class CoursePublisherRecipients
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique recipient identifier
     */
    #[ORM\Column(name: 'RecipientID', type: Types::GUID, nullable: false)]
    private ?string $recipientID = null;

    /**
     * Recipient name
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Date the recipient was created (UTC)
     */
    #[ORM\Column(name: 'CreatedAt', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * Date the recipient was last modified (UTC)
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRecipientID(): ?string
    {
        return $this->recipientID;
    }

    public function setRecipientID(string $recipientID): static
    {
        $this->recipientID = $recipientID;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

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
