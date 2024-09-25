<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LTIAdvantageRegistrationAuditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The LTI Advantage Registration Audit Brightspace Data Set logs the details of each time a user creates, updates, or
 * deletes an LTI registration. The data set captures events from June 2019 onwards.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4727-lti-data-sets#lti-advantage-registration-audit
 */
#[ORM\Entity(repositoryClass: LTIAdvantageRegistrationAuditRepository::class)]
#[ORM\Table(name: 'D2L_LTI_ADVANTAGE_REGISTRATION_AUDIT')]
#[UniqueConstraint(name: 'D2L_LTI_ADVANTAGE_REGISTRATION_AUDIT_PUK', columns: ['ClientId', 'Timestamp'])]
final class LTIAdvantageRegistrationAudit
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * The action completed by the event: Registered, Updated, or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 20, nullable: true)]
    private ?string $action = null;

    /**
     * Unique customer facing identifier assigned by the platform when the LTI tool is registered.
     */
    #[ORM\Column(name: 'ClientId', length: 510, nullable: false)]
    private ?string $clientId = null;

    /**
     * The name of the external learning tool.
     */
    #[ORM\Column(name: 'ToolName', length: 400, nullable: true)]
    private ?string $toolName = null;

    /**
     * Domain for the registered tool.
     */
    #[ORM\Column(name: 'Domain', length: 4000, nullable: true)]
    private ?string $domain = null;

    /**
     * List of Redirect URLs provided by the tool, formatted as comma-separated values (CSV) list. The list is truncated
     * to the max length allowed in the BDS field.
     */
    #[ORM\Column(name: 'RedirectURLs', length: 4000, nullable: true)]
    private ?string $redirectURLs = null;

    /**
     * The Keyset URL needed to complete the launch. The value is truncated to the max length allowed in the BDS field.
     * Field can be null.
     */
    #[ORM\Column(name: 'KeysetURL', length: 510, nullable: true)]
    private ?string $keysetURL = null;

    /**
     * The Initial LTI login request endpoint as by the tool. The value is truncated to the max length allowed in the
     * BDS field.
     */
    #[ORM\Column(name: 'LoginURL', length: 510, nullable: true)]
    private ?string $loginURL = null;

    /**
     * Indicates whether the registration is for LTI 1.1 or LTI 1.3.
     */
    #[ORM\Column(name: 'LTIVersion', length: 24, nullable: true)]
    private ?string $lTIVersion = null;

    /**
     * If true, the tool registration is enabled for the organization.
     */
    #[ORM\Column(name: 'IsRegistrationEnabled', nullable: true)]
    private ?bool $isRegistrationEnabled = null;

    /**
     * If true, the registration includes both contextual and institutional roles. If false, the registration only
     * includes contextual roles.
     */
    #[ORM\Column(name: 'SendInstitutionRole', nullable: true)]
    private ?bool $sendInstitutionRole = null;

    /**
     * Optional Target Link URI used during the Deep Linking workflow when the tool doesn't provide a launch URL for the
     * returned LTI Resource Link. Field can be null.
     */
    #[ORM\Column(name: 'TargetLinkURI', length: 510, nullable: true)]
    private ?string $targetLinkURI = null;

    /**
     * The ID of the Brightspace user that updated the tool registration data.
     */
    #[ORM\Column(name: 'ModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $modifiedBy = null;

    /**
     * If true, the Assignments and grades services (AGS) extension is enabled for this registration.
     */
    #[ORM\Column(name: 'HasAssignmentAndGradeServices', nullable: true)]
    private ?bool $hasAssignmentAndGradeServices = null;

    /**
     * If true, the Submission Review extension is enabled for this registration.
     */
    #[ORM\Column(name: 'HasSubmissionReview', nullable: true)]
    private ?bool $hasSubmissionReview = null;

    /**
     * If true, the Deep Linking extension is enabled for this registration.
     */
    #[ORM\Column(name: 'HasDeepLinking', nullable: true)]
    private ?bool $hasDeepLinking = null;

    /**
     * If true, the Names and Roles Provisioning Services (NPRS) extension is enabled for this registration.
     */
    #[ORM\Column(name: 'HasNamesAndRoleProvisioningServices', nullable: true)]
    private ?bool $hasNamesAndRoleProvisioningServices = null;

    /**
     * If true, the Activity Item Profile extension is enabled for this registration.
     */
    #[ORM\Column(name: 'HasActivityItemProfile', nullable: true)]
    private ?bool $hasActivityItemProfile = null;

    /**
     * If true, the Platform Notification Service is enabled for this registration.
     */
    #[ORM\Column(name: 'HasPlatformNotificationService', nullable: true)]
    private ?bool $hasPlatformNotificationService = null;

    /**
     * Date and time (UTC) when the user created or modified the registration.
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

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getToolName(): ?string
    {
        return $this->toolName;
    }

    public function setToolName(?string $toolName): static
    {
        $this->toolName = $toolName;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getRedirectURLs(): ?string
    {
        return $this->redirectURLs;
    }

    public function setRedirectURLs(?string $redirectURLs): static
    {
        $this->redirectURLs = $redirectURLs;

        return $this;
    }

    public function getKeysetURL(): ?string
    {
        return $this->keysetURL;
    }

    public function setKeysetURL(?string $keysetURL): static
    {
        $this->keysetURL = $keysetURL;

        return $this;
    }

    public function getLoginURL(): ?string
    {
        return $this->loginURL;
    }

    public function setLoginURL(?string $loginURL): static
    {
        $this->loginURL = $loginURL;

        return $this;
    }

    public function getLTIVersion(): ?string
    {
        return $this->lTIVersion;
    }

    public function setLTIVersion(?string $lTIVersion): static
    {
        $this->lTIVersion = $lTIVersion;

        return $this;
    }

    public function isRegistrationEnabled(): ?bool
    {
        return $this->isRegistrationEnabled;
    }

    public function setRegistrationEnabled(?bool $isRegistrationEnabled): static
    {
        $this->isRegistrationEnabled = $isRegistrationEnabled;

        return $this;
    }

    public function isSendInstitutionRole(): ?bool
    {
        return $this->sendInstitutionRole;
    }

    public function setSendInstitutionRole(?bool $sendInstitutionRole): static
    {
        $this->sendInstitutionRole = $sendInstitutionRole;

        return $this;
    }

    public function getTargetLinkURI(): ?string
    {
        return $this->targetLinkURI;
    }

    public function setTargetLinkURI(?string $targetLinkURI): static
    {
        $this->targetLinkURI = $targetLinkURI;

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

    public function hasAssignmentAndGradeServices(): ?bool
    {
        return $this->hasAssignmentAndGradeServices;
    }

    public function setHasAssignmentAndGradeServices(?bool $hasAssignmentAndGradeServices): static
    {
        $this->hasAssignmentAndGradeServices = $hasAssignmentAndGradeServices;

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

    public function hasDeepLinking(): ?bool
    {
        return $this->hasDeepLinking;
    }

    public function setHasDeepLinking(?bool $hasDeepLinking): static
    {
        $this->hasDeepLinking = $hasDeepLinking;

        return $this;
    }

    public function hasNamesAndRoleProvisioningServices(): ?bool
    {
        return $this->hasNamesAndRoleProvisioningServices;
    }

    public function setHasNamesAndRoleProvisioningServices(?bool $hasNamesAndRoleProvisioningServices): static
    {
        $this->hasNamesAndRoleProvisioningServices = $hasNamesAndRoleProvisioningServices;

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
