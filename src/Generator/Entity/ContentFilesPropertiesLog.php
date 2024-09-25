<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ContentFilesPropertiesLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * In the Content Files Properties Log Brightspace Data Set, each row represents a change (created, edited, or deleted)
 * to a file that is linked to a content object within an org unit. The data set only captures changes to content files
 * from July 2022 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4713-content-data-sets#content-files-properties-log
 */
#[ORM\Entity(repositoryClass: ContentFilesPropertiesLogRepository::class)]
#[ORM\Table(name: 'D2L_CONTENT_FILES_PROPERTIES_LOG')]
#[UniqueConstraint(name: 'D2L_CONTENT_FILES_PROPERTIES_LOG_PUK', columns: ['OrgUnitId', 'ContentObjectId', 'LastModified'])]
final class ContentFilesPropertiesLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: false)]
    private ?int $orgUnitId = null;

    /**
     * Unique identifier of the content object.
     */
    #[ORM\Column(name: 'ContentObjectId', precision: 10, nullable: false)]
    private ?int $contentObjectId = null;

    /**
     * Action taken on the file: Created, Updated, or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 20, nullable: true)]
    private ?string $action = null;

    /**
     * Virtual file path of the file.
     */
    #[ORM\Column(name: 'FilePath', length: 4000, nullable: true)]
    private ?string $filePath = null;

    /**
     * Name of the file.
     */
    #[ORM\Column(name: 'FileName', length: 1024, nullable: true)]
    private ?string $fileName = null;

    /**
     * Extension of the file.
     */
    #[ORM\Column(name: 'FileExtension', length: 1024, nullable: true)]
    private ?string $fileExtension = null;

    /**
     * Size of the file in bytes.
     */
    #[ORM\Column(name: 'FileSizeBytes', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $fileSizeBytes = null;

    /**
     * Time the file was uploaded (UTC).
     */
    #[ORM\Column(name: 'UploadDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $uploadDate = null;

    /**
     * Unique user identifier that last modified the file. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * The last time the file was modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $lastModified = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
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

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileExtension(): ?string
    {
        return $this->fileExtension;
    }

    public function setFileExtension(?string $fileExtension): static
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    public function getFileSizeBytes(): ?string
    {
        return $this->fileSizeBytes;
    }

    public function setFileSizeBytes(?string $fileSizeBytes): static
    {
        $this->fileSizeBytes = $fileSizeBytes;

        return $this;
    }

    public function getUploadDate(): ?\DateTimeImmutable
    {
        return $this->uploadDate;
    }

    public function setUploadDate(?\DateTimeImmutable $uploadDate): static
    {
        $this->uploadDate = $uploadDate;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }
}
