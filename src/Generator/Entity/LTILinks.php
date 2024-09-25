<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LTILinksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The LTI Links Brightspace Data Set retrieves the list of LTI links that exist in the organization. It does not
 * include deleted links.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4727-lti-data-sets#lti-links
 */
#[ORM\Entity(repositoryClass: LTILinksRepository::class)]
#[ORM\Table(name: 'D2L_LTI_LINK')]
#[UniqueConstraint(name: 'D2L_LTI_LINK_PUK', columns: ['LtiLinkId'])]
final class LTILinks
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the LTI link.
     */
    #[ORM\Column(name: 'LtiLinkId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $ltiLinkId = null;

    /**
     * Identifier for the Org Unit where the link was created.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The title of the link.
     */
    #[ORM\Column(name: 'Title', length: 400, nullable: true)]
    private ?string $title = null;

    /**
     * The type of link, either being a basic LTI launch or a CIM/Deep Linking launch to retrieve content from a tool.
     * (0 = Basic LTI Launch, 1 = Content Item Message or Deeplinking).
     */
    #[ORM\Column(name: 'LinkType', precision: 10, nullable: true)]
    private ?int $linkType = null;

    /**
     * Indicates whether the link is LTI 1.1 or LTI 1.3.
     */
    #[ORM\Column(name: 'LTIVersion', length: 24, nullable: true)]
    private ?string $lTIVersion = null;

    /**
     * The URL used during the launch. Field can be null.
     */
    #[ORM\Column(name: 'Url', length: 4000, nullable: true)]
    private ?string $url = null;

    /**
     * Description of the LTI link. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Determines if the link is displayed when adding to course content in the course. For LTI 1.1, this is called
     * IsVisible in the UI.
     */
    #[ORM\Column(name: 'IsVisible', nullable: true)]
    private ?bool $isVisible = null;

    /**
     * If true, determines if the tool_consumer variables are allowed to be included in the LTI launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendTCInfo', nullable: true)]
    private ?bool $sendTCInfo = null;

    /**
     * If true, determines if context_id, context_title, context_label, and context_type variables are included in the
     * LTI launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendContextInfo', nullable: true)]
    private ?bool $sendContextInfo = null;

    /**
     * If true, determines if LISSourcedId is included in the launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendCourseInfo', nullable: true)]
    private ?bool $sendCourseInfo = null;

    /**
     * If true, determines if Org Unit Id, Course Name, Course Code, Org Unit Type, LIS Course Offering Sourcedid, and
     * LIS Course Section Sourcedid are included in the LTI launch. LTI 1.3 only. Field can be null.
     */
    #[ORM\Column(name: 'SendOrgUnitInfo', nullable: true)]
    private ?bool $sendOrgUnitInfo = null;

    /**
     * If true, determines a unique identifier for the user, generated on the user's first launch. LTI 1.1 only. This is
     * always sent to LTI 1.3 and cannot be turned off unless Anonymous launch is used.
     */
    #[ORM\Column(name: 'SendUserId', nullable: true)]
    private ?bool $sendUserId = null;

    /**
     * If true, determines if users first, last, and given name (first last) are sent during launch.
     */
    #[ORM\Column(name: 'SendUserName', nullable: true)]
    private ?bool $sendUserName = null;

    /**
     * If true, determines if the user's primary email is sent during launch.
     */
    #[ORM\Column(name: 'SendUserEmail', nullable: true)]
    private ?bool $sendUserEmail = null;

    /**
     * If true, determines if the LTI Link Title is sent during launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendLinkTitle', nullable: true)]
    private ?bool $sendLinkTitle = null;

    /**
     * If true, determines if the LTI Link Description is sent during launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendLinkDescription', nullable: true)]
    private ?bool $sendLinkDescription = null;

    /**
     * If true, determines if the Brightspace username is sent during launch.
     */
    #[ORM\Column(name: 'SendD2LUserName', nullable: true)]
    private ?bool $sendD2LUserName = null;

    /**
     * If true, determines if the Brightspace OrgDefinedId is sent during launch.
     */
    #[ORM\Column(name: 'SendD2LOrgDefinedId', nullable: true)]
    private ?bool $sendD2LOrgDefinedId = null;

    /**
     * If true, determines if the custom Brightspace D2L role is sent during launch. LTI 1.1 only.
     */
    #[ORM\Column(name: 'SendD2LOrgRoleId', nullable: true)]
    private ?bool $sendD2LOrgRoleId = null;

    /**
     * If true, determines if the D2L User Id is sent during the launch. LTI 1.3 only. Field can be null.
     */
    #[ORM\Column(name: 'SendBrightspaceUserId', nullable: true)]
    private ?bool $sendBrightspaceUserId = null;

    /**
     * If true, no user information is sent during the launch. LTI 1.3 only. Field can be null.
     */
    #[ORM\Column(name: 'Anonymous', nullable: true)]
    private ?bool $anonymous = null;

    /**
     * Indicates whether the link is shared with additional org units or not. Field can be null.
     */
    #[ORM\Column(name: 'Shared', nullable: true)]
    private ?bool $shared = null;

    /**
     * If true, uses the Tool Provider security settings versus link security settings based on domain matching. LTI 1.1
     * only.
     */
    #[ORM\Column(name: 'UseToolProviderSecuritySettings', nullable: true)]
    private ?bool $useToolProviderSecuritySettings = null;

    /**
     * The last time a link was updated. Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * Unique sharing identifier. Can be used to join on LTI Links Shared. Field can be null.
     */
    #[ORM\Column(name: 'OuAvailabilitySetId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $ouAvailabilitySetId = null;

    /**
     * User ID of user who last modified the LTI link.
     */
    #[ORM\Column(name: 'LastModifiedBy', precision: 10, nullable: true)]
    private ?int $lastModifiedBy = null;

    /**
     * Indicates if the LTI link is deleted.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLtiLinkId(): ?string
    {
        return $this->ltiLinkId;
    }

    public function setLtiLinkId(string $ltiLinkId): static
    {
        $this->ltiLinkId = $ltiLinkId;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getLinkType(): ?int
    {
        return $this->linkType;
    }

    public function setLinkType(?int $linkType): static
    {
        $this->linkType = $linkType;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

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

    public function isVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setVisible(?bool $isVisible): static
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function isSendTCInfo(): ?bool
    {
        return $this->sendTCInfo;
    }

    public function setSendTCInfo(?bool $sendTCInfo): static
    {
        $this->sendTCInfo = $sendTCInfo;

        return $this;
    }

    public function isSendContextInfo(): ?bool
    {
        return $this->sendContextInfo;
    }

    public function setSendContextInfo(?bool $sendContextInfo): static
    {
        $this->sendContextInfo = $sendContextInfo;

        return $this;
    }

    public function isSendCourseInfo(): ?bool
    {
        return $this->sendCourseInfo;
    }

    public function setSendCourseInfo(?bool $sendCourseInfo): static
    {
        $this->sendCourseInfo = $sendCourseInfo;

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

    public function isSendUserId(): ?bool
    {
        return $this->sendUserId;
    }

    public function setSendUserId(?bool $sendUserId): static
    {
        $this->sendUserId = $sendUserId;

        return $this;
    }

    public function isSendUserName(): ?bool
    {
        return $this->sendUserName;
    }

    public function setSendUserName(?bool $sendUserName): static
    {
        $this->sendUserName = $sendUserName;

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

    public function isSendD2LUserName(): ?bool
    {
        return $this->sendD2LUserName;
    }

    public function setSendD2LUserName(?bool $sendD2LUserName): static
    {
        $this->sendD2LUserName = $sendD2LUserName;

        return $this;
    }

    public function isSendD2LOrgDefinedId(): ?bool
    {
        return $this->sendD2LOrgDefinedId;
    }

    public function setSendD2LOrgDefinedId(?bool $sendD2LOrgDefinedId): static
    {
        $this->sendD2LOrgDefinedId = $sendD2LOrgDefinedId;

        return $this;
    }

    public function isSendD2LOrgRoleId(): ?bool
    {
        return $this->sendD2LOrgRoleId;
    }

    public function setSendD2LOrgRoleId(?bool $sendD2LOrgRoleId): static
    {
        $this->sendD2LOrgRoleId = $sendD2LOrgRoleId;

        return $this;
    }

    public function isSendBrightspaceUserId(): ?bool
    {
        return $this->sendBrightspaceUserId;
    }

    public function setSendBrightspaceUserId(?bool $sendBrightspaceUserId): static
    {
        $this->sendBrightspaceUserId = $sendBrightspaceUserId;

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

    public function isShared(): ?bool
    {
        return $this->shared;
    }

    public function setShared(?bool $shared): static
    {
        $this->shared = $shared;

        return $this;
    }

    public function isUseToolProviderSecuritySettings(): ?bool
    {
        return $this->useToolProviderSecuritySettings;
    }

    public function setUseToolProviderSecuritySettings(?bool $useToolProviderSecuritySettings): static
    {
        $this->useToolProviderSecuritySettings = $useToolProviderSecuritySettings;

        return $this;
    }

    public function getLastModifiedDate(): ?\DateTimeImmutable
    {
        return $this->lastModifiedDate;
    }

    public function setLastModifiedDate(?\DateTimeImmutable $lastModifiedDate): static
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    public function getOuAvailabilitySetId(): ?string
    {
        return $this->ouAvailabilitySetId;
    }

    public function setOuAvailabilitySetId(?string $ouAvailabilitySetId): static
    {
        $this->ouAvailabilitySetId = $ouAvailabilitySetId;

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

    public function isDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setDeleted(?bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }
}
