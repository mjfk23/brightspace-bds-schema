<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LTIAdvantageDeploymentAuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The LTI Advantage Deployment Audit Brightspace Data Set logs the details of each time a user creates, updates, or
 * deletes an LTI deployment. The data set captures events from October 2019 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4727-lti-data-sets#lti-advantage-deployment-audit
 */
#[ORM\Entity(repositoryClass: LTIAdvantageDeploymentAuditRepository::class)]
#[ORM\Table(name: 'D2L_LTI_ADVANTAGE_DEPLOYMENT_AUDIT')]
#[UniqueConstraint(name: 'D2L_LTI_ADVANTAGE_DEPLOYMENT_AUDIT_PUK', columns: ['DeploymentID', 'Timestamp'])]
final class LTIAdvantageDeploymentAudit
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * The action completed by the event: Deployed, Updated, or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 20, nullable: true)]
    private ?string $action = null;

    /**
     * Unique identifier for the LTI Advantage deployment.
     */
    #[ORM\Column(name: 'DeploymentID', length: 72, nullable: false)]
    private ?string $deploymentID = null;

    /**
     * Unique identifier used in OAuth2 authentication, assigned by the platform when the LTI tool is registered.
     */
    #[ORM\Column(name: 'ClientID', length: 72, nullable: true)]
    private ?string $clientID = null;

    /**
     * The name for the deployment.
     */
    #[ORM\Column(name: 'DeploymentName', length: 400, nullable: true)]
    private ?string $deploymentName = null;

    /**
     * If false, it is not possible to do any launches for this tool or make any API calls for the extensions.
     */
    #[ORM\Column(name: 'IsDeploymentEnabled', nullable: true)]
    private ?bool $isDeploymentEnabled = null;

    /**
     * If true, the Assignments and grades services (AGS) extension is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasAssignmentsAndGrades', nullable: true)]
    private ?bool $hasAssignmentsAndGrades = null;

    /**
     * If true, the Deep Linking extension is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasDeepLinking', nullable: true)]
    private ?bool $hasDeepLinking = null;

    /**
     * If true, the Names and Roles Provisioning Services (NPRS) extension is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasNamesAndRoles', nullable: true)]
    private ?bool $hasNamesAndRoles = null;

    /**
     * If true, the Submission Review extension is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasSubmissionReview', nullable: true)]
    private ?bool $hasSubmissionReview = null;

    /**
     * If true, the Activity Item Profile extension is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasActivityItemProfile', nullable: true)]
    private ?bool $hasActivityItemProfile = null;

    /**
     * If true, the Platform Notification Service is enabled for this deployment.
     */
    #[ORM\Column(name: 'HasPlatformNotificationService', nullable: true)]
    private ?bool $hasPlatformNotificationService = null;

    /**
     * If true, the Context Copy message is enabled for this deployment. The Platform Notification Service must also be
     * enabled.
     */
    #[ORM\Column(name: 'HasContextCopy', nullable: true)]
    private ?bool $hasContextCopy = null;

    /**
     * The ID of the Brightspace user that modified the deployment record.
     */
    #[ORM\Column(name: 'ModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $modifiedBy = null;

    /**
     * If true, no user information is sent during launch.
     */
    #[ORM\Column(name: 'Anonymous', nullable: true)]
    private ?bool $anonymous = null;

    /**
     * If true, all users in the course are included whether they have performed a launch or not. If false, only users
     * that have performed a launch are included for NRPS and AGS Services.
     */
    #[ORM\Column(name: 'PreProvisioningEnabled', nullable: true)]
    private ?bool $preProvisioningEnabled = null;

    /**
     * If true, Org Unit Id, Course Name, Course Code, Org Unit Type, LIS Course Offering Sourcedid, and LIS Course
     * Section Sourcedid can be included in the launch.
     */
    #[ORM\Column(name: 'SendOrgUnitInfo', nullable: true)]
    private ?bool $sendOrgUnitInfo = null;

    /**
     * If true, user first name can be sent during launch.
     */
    #[ORM\Column(name: 'SendUserFirstName', nullable: true)]
    private ?bool $sendUserFirstName = null;

    /**
     * If true, user middle name is included in the data sent via NPRS.
     */
    #[ORM\Column(name: 'SendUserMiddleName', nullable: true)]
    private ?bool $sendUserMiddleName = null;

    /**
     * If true, user last name can be sent during launch.
     */
    #[ORM\Column(name: 'SendUserLastName', nullable: true)]
    private ?bool $sendUserLastName = null;

    /**
     * If true, user email address can be sent during launch.
     */
    #[ORM\Column(name: 'SendUserEmail', nullable: true)]
    private ?bool $sendUserEmail = null;

    /**
     * If true, D2L user ID can be sent during launch.
     */
    #[ORM\Column(name: 'SendBrightspaceUserID', nullable: true)]
    private ?bool $sendBrightspaceUserID = null;

    /**
     * If true, D2L username is sent during launch.
     */
    #[ORM\Column(name: 'SendBrightspaceUsername', nullable: true)]
    private ?bool $sendBrightspaceUsername = null;

    /**
     * If true, D2L Org Defined ID can be sent for this deployment.
     */
    #[ORM\Column(name: 'SendBrightspaceOrgDefinedId', nullable: true)]
    private ?bool $sendBrightspaceOrgDefinedId = null;

    /**
     * If true, LTI Link Title is sent during launch.
     */
    #[ORM\Column(name: 'SendLinkTitle', nullable: true)]
    private ?bool $sendLinkTitle = null;

    /**
     * If true, LTI Link Description is sent during launch.
     */
    #[ORM\Column(name: 'SendLinkDescription', nullable: true)]
    private ?bool $sendLinkDescription = null;

    /**
     * If true, the majority of new links created under the deployment open in an external window. If false, new links
     * open inline.
     */
    #[ORM\Column(name: 'OpenAsExternal', nullable: true)]
    private ?bool $openAsExternal = null;

    /**
     * If true, automatic migration can occur for links that match this deployment.
     */
    #[ORM\Column(name: 'AutoMigrateLinks', nullable: true)]
    private ?bool $autoMigrateLinks = null;

    /**
     * If true, the deployment is shared to multiple org units.
     */
    #[ORM\Column(name: 'IsSharedToManyOrgUnits', nullable: true)]
    private ?bool $isSharedToManyOrgUnits = null;

    /**
     * If true, the Auto Create Grade Items setting is enabled.
     */
    #[ORM\Column(name: 'AutoCreateGrades', nullable: true)]
    private ?bool $autoCreateGrades = null;

    /**
     * If true, grades created by LTI links for this deployment are included in the final grade calculation.
     */
    #[ORM\Column(name: 'IncludeInFinalGrade', nullable: true)]
    private ?bool $includeInFinalGrade = null;

    /**
     * Date and time (UTC) when the user created or modified the deployment.
     */
    #[ORM\Column(name: 'Timestamp', type: Types::DATETIMETZ_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $timestamp = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getDeploymentID(): ?string
    {
        return $this->deploymentID;
    }

    public function setDeploymentID(string $deploymentID): static
    {
        $this->deploymentID = $deploymentID;

        return $this;
    }

    public function getClientID(): ?string
    {
        return $this->clientID;
    }

    public function setClientID(?string $clientID): static
    {
        $this->clientID = $clientID;

        return $this;
    }

    public function getDeploymentName(): ?string
    {
        return $this->deploymentName;
    }

    public function setDeploymentName(?string $deploymentName): static
    {
        $this->deploymentName = $deploymentName;

        return $this;
    }

    public function isDeploymentEnabled(): ?bool
    {
        return $this->isDeploymentEnabled;
    }

    public function setDeploymentEnabled(?bool $isDeploymentEnabled): static
    {
        $this->isDeploymentEnabled = $isDeploymentEnabled;

        return $this;
    }

    public function hasAssignmentsAndGrades(): ?bool
    {
        return $this->hasAssignmentsAndGrades;
    }

    public function setHasAssignmentsAndGrades(?bool $hasAssignmentsAndGrades): static
    {
        $this->hasAssignmentsAndGrades = $hasAssignmentsAndGrades;

        return $this;
    }

    public function hasDeepLinking(): ?bool
    {
        return $this->hasDeepLinking;
    }

    public function setHasDeepLinking(?bool $hasDeepLinking): static
    {
        $this->hasDeepLinking = $hasDeepLinking;

        return $this;
    }

    public function hasNamesAndRoles(): ?bool
    {
        return $this->hasNamesAndRoles;
    }

    public function setHasNamesAndRoles(?bool $hasNamesAndRoles): static
    {
        $this->hasNamesAndRoles = $hasNamesAndRoles;

        return $this;
    }

    public function hasSubmissionReview(): ?bool
    {
        return $this->hasSubmissionReview;
    }

    public function setHasSubmissionReview(?bool $hasSubmissionReview): static
    {
        $this->hasSubmissionReview = $hasSubmissionReview;

        return $this;
    }

    public function hasActivityItemProfile(): ?bool
    {
        return $this->hasActivityItemProfile;
    }

    public function setHasActivityItemProfile(?bool $hasActivityItemProfile): static
    {
        $this->hasActivityItemProfile = $hasActivityItemProfile;

        return $this;
    }

    public function hasPlatformNotificationService(): ?bool
    {
        return $this->hasPlatformNotificationService;
    }

    public function setHasPlatformNotificationService(?bool $hasPlatformNotificationService): static
    {
        $this->hasPlatformNotificationService = $hasPlatformNotificationService;

        return $this;
    }

    public function hasContextCopy(): ?bool
    {
        return $this->hasContextCopy;
    }

    public function setHasContextCopy(?bool $hasContextCopy): static
    {
        $this->hasContextCopy = $hasContextCopy;

        return $this;
    }

    public function getModifiedBy(): ?string
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?string $modifiedBy): static
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function isAnonymous(): ?bool
    {
        return $this->anonymous;
    }

    public function setAnonymous(?bool $anonymous): static
    {
        $this->anonymous = $anonymous;

        return $this;
    }

    public function isPreProvisioningEnabled(): ?bool
    {
        return $this->preProvisioningEnabled;
    }

    public function setPreProvisioningEnabled(?bool $preProvisioningEnabled): static
    {
        $this->preProvisioningEnabled = $preProvisioningEnabled;

        return $this;
    }

    public function isSendOrgUnitInfo(): ?bool
    {
        return $this->sendOrgUnitInfo;
    }

    public function setSendOrgUnitInfo(?bool $sendOrgUnitInfo): static
    {
        $this->sendOrgUnitInfo = $sendOrgUnitInfo;

        return $this;
    }

    public function isSendUserFirstName(): ?bool
    {
        return $this->sendUserFirstName;
    }

    public function setSendUserFirstName(?bool $sendUserFirstName): static
    {
        $this->sendUserFirstName = $sendUserFirstName;

        return $this;
    }

    public function isSendUserMiddleName(): ?bool
    {
        return $this->sendUserMiddleName;
    }

    public function setSendUserMiddleName(?bool $sendUserMiddleName): static
    {
        $this->sendUserMiddleName = $sendUserMiddleName;

        return $this;
    }

    public function isSendUserLastName(): ?bool
    {
        return $this->sendUserLastName;
    }

    public function setSendUserLastName(?bool $sendUserLastName): static
    {
        $this->sendUserLastName = $sendUserLastName;

        return $this;
    }

    public function isSendUserEmail(): ?bool
    {
        return $this->sendUserEmail;
    }

    public function setSendUserEmail(?bool $sendUserEmail): static
    {
        $this->sendUserEmail = $sendUserEmail;

        return $this;
    }

    public function isSendBrightspaceUserID(): ?bool
    {
        return $this->sendBrightspaceUserID;
    }

    public function setSendBrightspaceUserID(?bool $sendBrightspaceUserID): static
    {
        $this->sendBrightspaceUserID = $sendBrightspaceUserID;

        return $this;
    }

    public function isSendBrightspaceUsername(): ?bool
    {
        return $this->sendBrightspaceUsername;
    }

    public function setSendBrightspaceUsername(?bool $sendBrightspaceUsername): static
    {
        $this->sendBrightspaceUsername = $sendBrightspaceUsername;

        return $this;
    }

    public function isSendBrightspaceOrgDefinedId(): ?bool
    {
        return $this->sendBrightspaceOrgDefinedId;
    }

    public function setSendBrightspaceOrgDefinedId(?bool $sendBrightspaceOrgDefinedId): static
    {
        $this->sendBrightspaceOrgDefinedId = $sendBrightspaceOrgDefinedId;

        return $this;
    }

    public function isSendLinkTitle(): ?bool
    {
        return $this->sendLinkTitle;
    }

    public function setSendLinkTitle(?bool $sendLinkTitle): static
    {
        $this->sendLinkTitle = $sendLinkTitle;

        return $this;
    }

    public function isSendLinkDescription(): ?bool
    {
        return $this->sendLinkDescription;
    }

    public function setSendLinkDescription(?bool $sendLinkDescription): static
    {
        $this->sendLinkDescription = $sendLinkDescription;

        return $this;
    }

    public function isOpenAsExternal(): ?bool
    {
        return $this->openAsExternal;
    }

    public function setOpenAsExternal(?bool $openAsExternal): static
    {
        $this->openAsExternal = $openAsExternal;

        return $this;
    }

    public function isAutoMigrateLinks(): ?bool
    {
        return $this->autoMigrateLinks;
    }

    public function setAutoMigrateLinks(?bool $autoMigrateLinks): static
    {
        $this->autoMigrateLinks = $autoMigrateLinks;

        return $this;
    }

    public function isSharedToManyOrgUnits(): ?bool
    {
        return $this->isSharedToManyOrgUnits;
    }

    public function setSharedToManyOrgUnits(?bool $isSharedToManyOrgUnits): static
    {
        $this->isSharedToManyOrgUnits = $isSharedToManyOrgUnits;

        return $this;
    }

    public function isAutoCreateGrades(): ?bool
    {
        return $this->autoCreateGrades;
    }

    public function setAutoCreateGrades(?bool $autoCreateGrades): static
    {
        $this->autoCreateGrades = $autoCreateGrades;

        return $this;
    }

    public function isIncludeInFinalGrade(): ?bool
    {
        return $this->includeInFinalGrade;
    }

    public function setIncludeInFinalGrade(?bool $includeInFinalGrade): static
    {
        $this->includeInFinalGrade = $includeInFinalGrade;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
