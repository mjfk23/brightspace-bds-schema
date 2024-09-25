<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\LTILaunchesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The LTI Launches Brightspace Data Set logs details of each time a user launches an LTI link in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4727-lti-data-sets#lti-launches
 */
#[ORM\Entity(repositoryClass: LTILaunchesRepository::class)]
#[ORM\Table(name: 'D2L_LTI_LAUNCH')]
#[UniqueConstraint(name: 'D2L_LTI_LAUNCH_PUK', columns: ['LTILaunchId'])]
final class LTILaunches
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each individual launch.
     */
    #[ORM\Column(name: 'LTILaunchId', type: Types::GUID, nullable: false)]
    private ?string $lTILaunchId = null;

    /**
     * The user who performed this launch.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * A list of user's IMS roles.
     */
    #[ORM\Column(name: 'IMSRoleNames', length: 4000, nullable: true)]
    private ?string $iMSRoleNames = null;

    /**
     * The impersonating user who performed this launch. Field can be null.
     */
    #[ORM\Column(name: 'ImpersonatingUserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $impersonatingUserId = null;

    /**
     * A list of impersonating user's IMS roles. Field can be null.
     */
    #[ORM\Column(name: 'ImpersonatingUserIMSRoleName', length: 4000, nullable: true)]
    private ?string $impersonatingUserIMSRoleName = null;

    /**
     * The UTC time when this launch occurred.
     */
    #[ORM\Column(name: 'LaunchDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $launchDate = null;

    /**
     * Id of the org unit where this launch happened.
     */
    #[ORM\Column(name: 'OrgUnitId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $orgUnitId = null;

    /**
     * The id of the link that was used for the LTI launch. Field can be null.
     */
    #[ORM\Column(name: 'LTILinkId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lTILinkId = null;

    /**
     * The unique identifier of the link's deployment that was used for the LTI launch. This is only available for LTI
     * 1.3 links. Field can be null.
     */
    #[ORM\Column(name: 'DeploymentId', type: Types::GUID, nullable: true)]
    private ?string $deploymentId = null;

    /**
     * The unique identifier of the link's registration that was used for the LTI launch. This is only available for LTI
     * 1.3 links. Field can be null.
     */
    #[ORM\Column(name: 'ClientId', type: Types::GUID, nullable: true)]
    private ?string $clientId = null;

    /**
     * The id of the link's tool provider that was used for the LTI launch. This is only available for LTI 1.1 links.
     * Field can be null.
     */
    #[ORM\Column(name: 'ToolProviderId', length: 600, nullable: true)]
    private ?string $toolProviderId = null;

    /**
     * Id of the content topic where this launch happened. Field can be null.
     */
    #[ORM\Column(name: 'ContentTopicId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $contentTopicId = null;

    /**
     * Id of the parent module where this launch happened. Field can be null.
     */
    #[ORM\Column(name: 'ParentModuleId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $parentModuleId = null;

    /**
     * Placement type of this launch. Field can be null.
     */
    #[ORM\Column(name: 'Placement', length: 20, nullable: true)]
    private ?string $placement = null;

    /**
     * LTI message version of this launch. Field can be null.
     */
    #[ORM\Column(name: 'MessageVersion', length: 20, nullable: true)]
    private ?string $messageVersion = null;

    /**
     * LTI request type of this launch. Field can be null.
     */
    #[ORM\Column(name: 'RequestType', length: 60, nullable: true)]
    private ?string $requestType = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLTILaunchId(): ?string
    {
        return $this->lTILaunchId;
    }

    public function setLTILaunchId(string $lTILaunchId): static
    {
        $this->lTILaunchId = $lTILaunchId;

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

    public function getIMSRoleNames(): ?string
    {
        return $this->iMSRoleNames;
    }

    public function setIMSRoleNames(?string $iMSRoleNames): static
    {
        $this->iMSRoleNames = $iMSRoleNames;

        return $this;
    }

    public function getImpersonatingUserId(): ?string
    {
        return $this->impersonatingUserId;
    }

    public function setImpersonatingUserId(?string $impersonatingUserId): static
    {
        $this->impersonatingUserId = $impersonatingUserId;

        return $this;
    }

    public function getImpersonatingUserIMSRoleName(): ?string
    {
        return $this->impersonatingUserIMSRoleName;
    }

    public function setImpersonatingUserIMSRoleName(?string $impersonatingUserIMSRoleName): static
    {
        $this->impersonatingUserIMSRoleName = $impersonatingUserIMSRoleName;

        return $this;
    }

    public function getLaunchDate(): ?\DateTimeImmutable
    {
        return $this->launchDate;
    }

    public function setLaunchDate(?\DateTimeImmutable $launchDate): static
    {
        $this->launchDate = $launchDate;

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

    public function getLTILinkId(): ?string
    {
        return $this->lTILinkId;
    }

    public function setLTILinkId(?string $lTILinkId): static
    {
        $this->lTILinkId = $lTILinkId;

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

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(?string $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getToolProviderId(): ?string
    {
        return $this->toolProviderId;
    }

    public function setToolProviderId(?string $toolProviderId): static
    {
        $this->toolProviderId = $toolProviderId;

        return $this;
    }

    public function getContentTopicId(): ?string
    {
        return $this->contentTopicId;
    }

    public function setContentTopicId(?string $contentTopicId): static
    {
        $this->contentTopicId = $contentTopicId;

        return $this;
    }

    public function getParentModuleId(): ?string
    {
        return $this->parentModuleId;
    }

    public function setParentModuleId(?string $parentModuleId): static
    {
        $this->parentModuleId = $parentModuleId;

        return $this;
    }

    public function getPlacement(): ?string
    {
        return $this->placement;
    }

    public function setPlacement(?string $placement): static
    {
        $this->placement = $placement;

        return $this;
    }

    public function getMessageVersion(): ?string
    {
        return $this->messageVersion;
    }

    public function setMessageVersion(?string $messageVersion): static
    {
        $this->messageVersion = $messageVersion;

        return $this;
    }

    public function getRequestType(): ?string
    {
        return $this->requestType;
    }

    public function setRequestType(?string $requestType): static
    {
        $this->requestType = $requestType;

        return $this;
    }
}
