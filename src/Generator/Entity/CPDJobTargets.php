<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CPDJobTargetsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The CPD Job Targets Brightspace Data Set returns a list of all targets set by the user attribute Job Title. If no
 * user attributes are defined for your organization, the data set will be empty.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26020-continuous-professional-development-cpd-data-sets#cpd-job-targets
 */
#[ORM\Entity(repositoryClass: CPDJobTargetsRepository::class)]
#[ORM\Table(name: 'D2L_CPD_JOB_TARGET')]
#[UniqueConstraint(name: 'D2L_CPD_JOB_TARGET_PUK', columns: ['PrincipalId', 'SubjectId'])]
final class CPDJobTargets
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the principal which sets the job target.
     */
    #[ORM\Column(name: 'PrincipalId', precision: 10, nullable: false)]
    private ?int $principalId = null;

    /**
     * Unique identifier for the subject associated with the job target.
     */
    #[ORM\Column(name: 'SubjectId', precision: 10, nullable: false)]
    private ?int $subjectId = null;

    /**
     * The title of the job.
     */
    #[ORM\Column(name: 'JobTitle', length: 4000, nullable: true)]
    private ?string $jobTitle = null;

    /**
     * The structured record duration of the job target. Field can be null.
     */
    #[ORM\Column(name: 'StructuredMinutes', precision: 10, nullable: true)]
    private ?int $structuredMinutes = null;

    /**
     * The unstructured record duration of the job target. Field can be null.
     */
    #[ORM\Column(name: 'UnstructuredMinutes', precision: 10, nullable: true)]
    private ?int $unstructuredMinutes = null;

    /**
     * The structured record count of the job target. Field can be null.
     */
    #[ORM\Column(name: 'StructuredRecordCount', precision: 10, nullable: true)]
    private ?int $structuredRecordCount = null;

    /**
     * The unstructured record count of the job target. Field can be null.
     */
    #[ORM\Column(name: 'UnstructuredRecordCount', precision: 10, nullable: true)]
    private ?int $unstructuredRecordCount = null;

    /**
     * The date (UTC) of rolling or specific SPS for job annual target and progress tracking has been updated. Field can
     * be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * The date and time (UTC) the subject was deleted. Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * The date and time (UTC) the job target was added or last updated based on the Tracking Method.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Indicates the version of the row. The Version of the job target is updated based on the Tracking Method.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getPrincipalId(): ?int
    {
        return $this->principalId;
    }

    public function setPrincipalId(int $principalId): static
    {
        $this->principalId = $principalId;

        return $this;
    }

    public function getSubjectId(): ?int
    {
        return $this->subjectId;
    }

    public function setSubjectId(int $subjectId): static
    {
        $this->subjectId = $subjectId;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getStructuredMinutes(): ?int
    {
        return $this->structuredMinutes;
    }

    public function setStructuredMinutes(?int $structuredMinutes): static
    {
        $this->structuredMinutes = $structuredMinutes;

        return $this;
    }

    public function getUnstructuredMinutes(): ?int
    {
        return $this->unstructuredMinutes;
    }

    public function setUnstructuredMinutes(?int $unstructuredMinutes): static
    {
        $this->unstructuredMinutes = $unstructuredMinutes;

        return $this;
    }

    public function getStructuredRecordCount(): ?int
    {
        return $this->structuredRecordCount;
    }

    public function setStructuredRecordCount(?int $structuredRecordCount): static
    {
        $this->structuredRecordCount = $structuredRecordCount;

        return $this;
    }

    public function getUnstructuredRecordCount(): ?int
    {
        return $this->unstructuredRecordCount;
    }

    public function setUnstructuredRecordCount(?int $unstructuredRecordCount): static
    {
        $this->unstructuredRecordCount = $unstructuredRecordCount;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

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
