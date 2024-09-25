<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\PortfolioEvidenceLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Portfolio Evidence Log Brightspace Data Set returns the actions that occur to each piece of evidence in the
 * Portfolios in your organization. The first data point is from May, 2019 or your first use of the Portfolio tool,
 * whichever is more recent.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4530-portfolio-data-sets#portfolio-evidence-log
 */
#[ORM\Entity(repositoryClass: PortfolioEvidenceLogRepository::class)]
#[ORM\Table(name: 'D2L_PORTFOLIO_EVIDENCE_LOG')]
#[UniqueConstraint(name: 'D2L_PORTFOLIO_EVIDENCE_LOG_PUK', columns: ['LogId'])]
final class PortfolioEvidenceLog
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each action that occurs on each object in a portfolio.
     */
    #[ORM\Column(name: 'LogId', type: Types::GUID, nullable: false)]
    private ?string $logId = null;

    /**
     * Unique identifier of the evidence. Field can be null.
     */
    #[ORM\Column(name: 'ParentObjectId', type: Types::GUID, nullable: true)]
    private ?string $parentObjectId = null;

    /**
     * Unique identifier of the object where the action occurred. This is equal to ParentObjectId when the ObjectType is
     * evidence.
     */
    #[ORM\Column(name: 'ObjectId', type: Types::GUID, nullable: true)]
    private ?string $objectId = null;

    /**
     * Indicates what type of object the action occurred on such as the evidence itself or reflection, etc.
     */
    #[ORM\Column(name: 'ObjectType', length: 80, nullable: true)]
    private ?string $objectType = null;

    /**
     * Unique user identifier.
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: true)]
    private ?int $userId = null;

    /**
     * Unique org unit identifier. Field can be null.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * The action that occurred: Created, Updated or Deleted.
     */
    #[ORM\Column(name: 'Action', length: 32, nullable: true)]
    private ?string $action = null;

    /**
     * Indicates if the action occurred on a mobile device.
     */
    #[ORM\Column(name: 'IsMobile', nullable: true)]
    private ?bool $isMobile = null;

    /**
     * Date action was completed (UTC).
     */
    #[ORM\Column(name: 'ActionDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $actionDate = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getLogId(): ?string
    {
        return $this->logId;
    }

    public function setLogId(string $logId): static
    {
        $this->logId = $logId;

        return $this;
    }

    public function getParentObjectId(): ?string
    {
        return $this->parentObjectId;
    }

    public function setParentObjectId(?string $parentObjectId): static
    {
        $this->parentObjectId = $parentObjectId;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(?string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    public function setObjectType(?string $objectType): static
    {
        $this->objectType = $objectType;

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

    public function getOrgUnitId(): ?int
    {
        return $this->orgUnitId;
    }

    public function setOrgUnitId(?int $orgUnitId): static
    {
        $this->orgUnitId = $orgUnitId;

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

    public function isMobile(): ?bool
    {
        return $this->isMobile;
    }

    public function setMobile(?bool $isMobile): static
    {
        $this->isMobile = $isMobile;

        return $this;
    }

    public function getActionDate(): ?\DateTimeImmutable
    {
        return $this->actionDate;
    }

    public function setActionDate(?\DateTimeImmutable $actionDate): static
    {
        $this->actionDate = $actionDate;

        return $this;
    }
}
