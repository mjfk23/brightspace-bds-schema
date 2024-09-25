<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\SCORMObjectsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The SCORM Objects Brightspace Data Set describes all the SCORM objects that exist, and which course and which topic
 * they are located in. At time of launch, this data set contains data from July 2020 onwards. Remaining baseline data
 * will be filled in upon a future release.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4536-scorm-data-sets#scorm-objects
 */
#[ORM\Entity(repositoryClass: SCORMObjectsRepository::class)]
#[ORM\Table(name: 'D2L_SCORM_OBJECT')]
#[UniqueConstraint(name: 'D2L_SCORM_OBJECT_PUK', columns: ['ScormObjectId'])]
final class SCORMObjects
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier of the SCORM object.
     */
    #[ORM\Column(name: 'ScormObjectId', type: Types::GUID, nullable: false)]
    private ?string $scormObjectId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique identifier of the content topic.
     */
    #[ORM\Column(name: 'ContentObjectId', precision: 10, nullable: true)]
    private ?int $contentObjectId = null;

    /**
     * Unique identifier for the associated content in content service.
     */
    #[ORM\Column(name: 'ContentServiceContentId', type: Types::GUID, nullable: true)]
    private ?string $contentServiceContentId = null;

    /**
     * Unique identifier of the associated revision in content service.
     */
    #[ORM\Column(name: 'ContentServiceRevisionId', type: Types::GUID, nullable: true)]
    private ?string $contentServiceRevisionId = null;

    /**
     * Unique identifier of the associated topic in content service.
     */
    #[ORM\Column(name: 'ContentServiceTopicId', type: Types::GUID, nullable: true)]
    private ?string $contentServiceTopicId = null;

    /**
     * The title of the SCORM object. Field can be null.
     */
    #[ORM\Column(name: 'Title', length: 2000, nullable: true)]
    private ?string $title = null;

    /**
     * The description of the SCORM package. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * The learning standard used by the SCORM content, one of SCORM_11, SCORM_12, SCORM_2004_2ND_EDITION,
     * SCORM_2004_3RD_EDITION, SCORM_2004_4TH_EDITION, AICC, XAPI, CMI5. Field can be null.
     */
    #[ORM\Column(name: 'LearningStandard', length: 200, nullable: true)]
    private ?string $learningStandard = null;

    /**
     * Date when the SCORM content was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * User that last modified this SCORM object.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getScormObjectId(): ?string
    {
        return $this->scormObjectId;
    }

    public function setScormObjectId(string $scormObjectId): static
    {
        $this->scormObjectId = $scormObjectId;

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

    public function getContentObjectId(): ?int
    {
        return $this->contentObjectId;
    }

    public function setContentObjectId(?int $contentObjectId): static
    {
        $this->contentObjectId = $contentObjectId;

        return $this;
    }

    public function getContentServiceContentId(): ?string
    {
        return $this->contentServiceContentId;
    }

    public function setContentServiceContentId(?string $contentServiceContentId): static
    {
        $this->contentServiceContentId = $contentServiceContentId;

        return $this;
    }

    public function getContentServiceRevisionId(): ?string
    {
        return $this->contentServiceRevisionId;
    }

    public function setContentServiceRevisionId(?string $contentServiceRevisionId): static
    {
        $this->contentServiceRevisionId = $contentServiceRevisionId;

        return $this;
    }

    public function getContentServiceTopicId(): ?string
    {
        return $this->contentServiceTopicId;
    }

    public function setContentServiceTopicId(?string $contentServiceTopicId): static
    {
        $this->contentServiceTopicId = $contentServiceTopicId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

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

    public function getLearningStandard(): ?string
    {
        return $this->learningStandard;
    }

    public function setLearningStandard(?string $learningStandard): static
    {
        $this->learningStandard = $learningStandard;

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
