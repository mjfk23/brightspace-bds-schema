<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\CPDMethodsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The CPD Methods Brightspace Data Set returns a list of all methods defined within the CPD tool.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/26020-continuous-professional-development-cpd-data-sets#cpd-methods
 */
#[ORM\Entity(repositoryClass: CPDMethodsRepository::class)]
#[ORM\Table(name: 'D2L_CPD_METHOD')]
#[UniqueConstraint(name: 'D2L_CPD_METHOD_PUK', columns: ['MethodId'])]
final class CPDMethods
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique identifier for each method.
     */
    #[ORM\Column(name: 'MethodId', precision: 10, nullable: false)]
    private ?int $methodId = null;

    /**
     * The name of the method.
     */
    #[ORM\Column(name: 'Name', length: 4000, nullable: true)]
    private ?string $name = null;

    /**
     * The date and time (UTC) the method was added or last updated. Field can be null.
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * The date and time (UTC) the method was deleted. Field can be null.
     */
    #[ORM\Column(name: 'DateDeleted', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getMethodId(): ?int
    {
        return $this->methodId;
    }

    public function setMethodId(int $methodId): static
    {
        $this->methodId = $methodId;

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

    public function getLastModified(): ?\DateTimeImmutable
    {
        return $this->lastModified;
    }

    public function setLastModified(?\DateTimeImmutable $lastModified): static
    {
        $this->lastModified = $lastModified;

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
