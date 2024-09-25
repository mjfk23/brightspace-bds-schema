<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\QuizSurveySectionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Quiz Survey Sections Brightspace Data Set returns information about all the sections and question pools that have
 * been created in quizzes in the organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4538-surveys-data-sets#quiz-survey-sections
 */
#[ORM\Entity(repositoryClass: QuizSurveySectionsRepository::class)]
#[ORM\Table(name: 'D2L_QUIZ_SURVEY_SECTION')]
#[UniqueConstraint(name: 'D2L_QUIZ_SURVEY_SECTION_PUK', columns: ['SectionId'])]
final class QuizSurveySections
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique question collection identifier.
     */
    #[ORM\Column(name: 'CollectionId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $collectionId = null;

    /**
     * Unique section identifier.
     */
    #[ORM\Column(name: 'SectionId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $sectionId = null;

    /**
     * Name of the section (title). Field can be null.
     */
    #[ORM\Column(name: 'Name', length: 512, nullable: true)]
    private ?string $name = null;

    /**
     * Indicates if the section name (title) is hidden or shown. Values are 0 for hidden, and 1 for shown.
     */
    #[ORM\Column(name: 'NameIsDisplayed', nullable: true)]
    private ?bool $nameIsDisplayed = null;

    /**
     * Indicates if the section is a question pool.
     */
    #[ORM\Column(name: 'IsQuestionPool', nullable: true)]
    private ?bool $isQuestionPool = null;

    /**
     * Section text. Field can be null.
     */
    #[ORM\Column(name: 'SectionText', length: 2000, nullable: true)]
    private ?string $sectionText = null;

    /**
     * Indicates if the section text is HTML or plain text.
     */
    #[ORM\Column(name: 'SectionTextIsHTML', nullable: true)]
    private ?bool $sectionTextIsHTML = null;

    /**
     * Indicates if the section text is hidden or shown. Values are 0 for hidden, and 1 for shown.
     */
    #[ORM\Column(name: 'IsSectionTextHidden', nullable: true)]
    private ?bool $isSectionTextHidden = null;

    /**
     * Number of points the section is worth when the section is a question pool. Sections that are not question pools
     * will show as null. Field can be null.
     */
    #[ORM\Column(name: 'QuestionPoints', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $questionPoints = null;

    /**
     * Indicates the number of questions in the section if the section is a question pool. If the section is not a
     * question pool, 0 is displayed.
     */
    #[ORM\Column(name: 'NumQuestions', precision: 10, nullable: true)]
    private ?int $numQuestions = null;

    /**
     * Indicates the number of choices in the question pool (pool size).
     */
    #[ORM\Column(name: 'NumChoices', precision: 10, nullable: true)]
    private ?int $numChoices = null;

    /**
     * Indicates that the questions in the section are shuffled. Not to be confused with a question pool; a shuffled
     * section displays the questions shuffled randomly.
     */
    #[ORM\Column(name: 'Shuffle', nullable: true)]
    private ?bool $shuffle = null;

    /**
     * Date the section was created (UTC).
     */
    #[ORM\Column(name: 'CreationDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $creationDate = null;

    /**
     * Id of the user who created the section. Field can be null.
     */
    #[ORM\Column(name: 'CreatedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $createdBy = null;

    /**
     * Date when the section was last modified (UTC).
     */
    #[ORM\Column(name: 'LastModified', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModified = null;

    /**
     * Id of the user who last modified the section. If questions are imported into the section, this will be null.
     * Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedBy', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lastModifiedBy = null;

    /**
     * Indicates that the section is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets. Field can be null.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getCollectionId(): ?string
    {
        return $this->collectionId;
    }

    public function setCollectionId(?string $collectionId): static
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    public function getSectionId(): ?string
    {
        return $this->sectionId;
    }

    public function setSectionId(string $sectionId): static
    {
        $this->sectionId = $sectionId;

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

    public function isNameIsDisplayed(): ?bool
    {
        return $this->nameIsDisplayed;
    }

    public function setNameIsDisplayed(?bool $nameIsDisplayed): static
    {
        $this->nameIsDisplayed = $nameIsDisplayed;

        return $this;
    }

    public function isQuestionPool(): ?bool
    {
        return $this->isQuestionPool;
    }

    public function setQuestionPool(?bool $isQuestionPool): static
    {
        $this->isQuestionPool = $isQuestionPool;

        return $this;
    }

    public function getSectionText(): ?string
    {
        return $this->sectionText;
    }

    public function setSectionText(?string $sectionText): static
    {
        $this->sectionText = $sectionText;

        return $this;
    }

    public function isSectionTextIsHTML(): ?bool
    {
        return $this->sectionTextIsHTML;
    }

    public function setSectionTextIsHTML(?bool $sectionTextIsHTML): static
    {
        $this->sectionTextIsHTML = $sectionTextIsHTML;

        return $this;
    }

    public function isSectionTextHidden(): ?bool
    {
        return $this->isSectionTextHidden;
    }

    public function setSectionTextHidden(?bool $isSectionTextHidden): static
    {
        $this->isSectionTextHidden = $isSectionTextHidden;

        return $this;
    }

    public function getQuestionPoints(): ?string
    {
        return $this->questionPoints;
    }

    public function setQuestionPoints(?string $questionPoints): static
    {
        $this->questionPoints = $questionPoints;

        return $this;
    }

    public function getNumQuestions(): ?int
    {
        return $this->numQuestions;
    }

    public function setNumQuestions(?int $numQuestions): static
    {
        $this->numQuestions = $numQuestions;

        return $this;
    }

    public function getNumChoices(): ?int
    {
        return $this->numChoices;
    }

    public function setNumChoices(?int $numChoices): static
    {
        $this->numChoices = $numChoices;

        return $this;
    }

    public function isShuffle(): ?bool
    {
        return $this->shuffle;
    }

    public function setShuffle(?bool $shuffle): static
    {
        $this->shuffle = $shuffle;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeImmutable $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;

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

    public function getLastModifiedBy(): ?string
    {
        return $this->lastModifiedBy;
    }

    public function setLastModifiedBy(?string $lastModifiedBy): static
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
