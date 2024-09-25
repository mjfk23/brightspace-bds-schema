<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LTILinkMigrationAuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The LTI Link Migration Audit Brightspace Data Set logs all attempted LTI link migrations. Each row in the data set
 * represents an attempted link migration from LTI 1.1 to LTI 1.3.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4727-lti-data-sets#lti-link-migration-audit
 */
#[ORM\Entity(repositoryClass: LTILinkMigrationAuditRepository::class)]
#[ORM\Table(name: 'D2L_LTI_LINK_MIGRATION_AUDIT')]
#[UniqueConstraint(name: 'D2L_LTI_LINK_MIGRATION_AUDIT_PUK', columns: ['LTIMigrationId'])]
final class LTILinkMigrationAudit
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each individual link migration
     */
    #[ORM\Column(name: 'LTIMigrationId', type: Types::GUID, nullable: false)]
    private ?string $lTIMigrationId = null;

    /**
     * ID of the person who triggered the migration
     */
    #[ORM\Column(name: 'UserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $userId = null;

    /**
     * The date the migration occurred for this link (UTC)
     */
    #[ORM\Column(name: 'MigrationDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $migrationDate = null;

    /**
     * ID of the org unit where the launch migration occurred
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * ID of the link that was migrated
     */
    #[ORM\Column(name: 'LinkId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $linkId = null;

    /**
     * Launch URL for the link
     */
    #[ORM\Column(name: 'LinkURL', length: 4000, nullable: true)]
    private ?string $linkURL = null;

    /**
     * Name of the link
     */
    #[ORM\Column(name: 'LinkName', length: 400, nullable: true)]
    private ?string $linkName = null;

    /**
     * ID of the registration this link was migrated to. Field can be null.
     */
    #[ORM\Column(name: 'ClientId', length: 510, nullable: true)]
    private ?string $clientId = null;

    /**
     * Domain of the registration this link was migrated to. Field can be null.
     */
    #[ORM\Column(name: 'RegistrationDomain', length: 4000, nullable: true)]
    private ?string $registrationDomain = null;

    /**
     * ID of the link's deployment that was used for the LTI migration. Field can be null.
     */
    #[ORM\Column(name: 'DeploymentId', type: Types::GUID, nullable: true)]
    private ?string $deploymentId = null;

    /**
     * ID for the job this link was migrated under.
     */
    #[ORM\Column(name: 'JobId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $jobId = null;

    /**
     * Status result for this link migration. Possible values: 0 = Success 1 = Error 2 = Not Found
     */
    #[ORM\Column(name: 'Status', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $status = null;

    /**
     * Error code for failed migrations. Possible values: 0 = Registration Not Found 1 = Deployment Not Enabled 2 =
     * Deployment Not Found 3 = Link Not Found 4 = Link Not Legacy 5 = Link URL Invalid 6 = Unknown 7 = Auto Migrate is
     * not enabled in the deployment Field can be null.
     */
    #[ORM\Column(name: 'FailureCode', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $failureCode = null;

    /**
     * How migration was triggered. Possible values: 0 = Link API 1 = Copy Course 2 = Course Migration Button 3 = Course
     * Migration API
     */
    #[ORM\Column(name: 'MigrationType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $migrationType = null;

    /**
     * The legacy domain the link was migrated from. Only populates if the legacy domain is different than the
     * registration domain. Field can be null.
     */
    #[ORM\Column(name: 'LegacyURL', length: 4000, nullable: true)]
    private ?string $legacyURL = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLTIMigrationId(): ?string
    {
        return $this->lTIMigrationId;
    }

    public function setLTIMigrationId(string $lTIMigrationId): static
    {
        $this->lTIMigrationId = $lTIMigrationId;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getMigrationDate(): ?\DateTimeImmutable
    {
        return $this->migrationDate;
    }

    public function setMigrationDate(?\DateTimeImmutable $migrationDate): static
    {
        $this->migrationDate = $migrationDate;

        return $this;
    }

    public function getOrgUnitId(): ?string
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?string $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

        return $this;
    }

    public function getLinkId(): ?string
    {
        return $this->linkId;
    }

    public function setLinkId(?string $linkId): static
    {
        $this->linkId = $linkId;

        return $this;
    }

    public function getLinkURL(): ?string
    {
        return $this->linkURL;
    }

    public function setLinkURL(?string $linkURL): static
    {
        $this->linkURL = $linkURL;

        return $this;
    }

    public function getLinkName(): ?string
    {
        return $this->linkName;
    }

    public function setLinkName(?string $linkName): static
    {
        $this->linkName = $linkName;

        return $this;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(?string $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getRegistrationDomain(): ?string
    {
        return $this->registrationDomain;
    }

    public function setRegistrationDomain(?string $registrationDomain): static
    {
        $this->registrationDomain = $registrationDomain;

        return $this;
    }

    public function getDeploymentId(): ?string
    {
        return $this->deploymentId;
    }

    public function setDeploymentId(?string $deploymentId): static
    {
        $this->deploymentId = $deploymentId;

        return $this;
    }

    public function getJobId(): ?string
    {
        return $this->jobId;
    }

    public function setJobId(?string $jobId): static
    {
        $this->jobId = $jobId;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getFailureCode(): ?int
    {
        return $this->failureCode;
    }

    public function setFailureCode(?int $failureCode): static
    {
        $this->failureCode = $failureCode;

        return $this;
    }

    public function getMigrationType(): ?int
    {
        return $this->migrationType;
    }

    public function setMigrationType(?int $migrationType): static
    {
        $this->migrationType = $migrationType;

        return $this;
    }

    public function getLegacyURL(): ?string
    {
        return $this->legacyURL;
    }

    public function setLegacyURL(?string $legacyURL): static
    {
        $this->legacyURL = $legacyURL;

        return $this;
    }
}
