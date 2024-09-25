<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\ToolsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Tools Brightspace Data Set retrieves the data on all the tools that exist in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4540-tools-data-sets#tools
 */
#[ORM\Entity(repositoryClass: ToolsRepository::class)]
#[ORM\Table(name: 'D2L_TOOL')]
#[UniqueConstraint(name: 'D2L_TOOL_PUK', columns: ['ToolId'])]
final class Tools
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for the tool
     */
    #[ORM\Column(name: 'ToolId', precision: 10, nullable: false)]
    private ?int $toolId = null;

    /**
     * Unique tool name
     */
    #[ORM\Column(name: 'Name', length: 100, nullable: true)]
    private ?string $name = null;

    /**
     * Display name of the tool
     */
    #[ORM\Column(name: 'DisplayName', length: 400, nullable: true)]
    private ?string $displayName = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getToolId(): ?int
    {
        return $this->toolId;
    }

    public function setToolId(int $toolId): static
    {
        $this->toolId = $toolId;

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

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): static
    {
        $this->displayName = $displayName;

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
