<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\DiscussionTopicsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Discussion Topics Brightspace Data Set returns discussion topics. Results are ordered from newest to oldest.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4525-discussions-data-sets#discussion-topics
 */
#[ORM\Entity(repositoryClass: DiscussionTopicsRepository::class)]
#[ORM\Table(name: 'D2L_DISCUSSION_TOPIC')]
#[UniqueConstraint(name: 'D2L_DISCUSSION_TOPIC_PUK', columns: ['TopicId'])]
final class DiscussionTopics
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique org unit identifier.
     */
    #[ORM\Column(name: 'OrgUnitId', precision: 10, nullable: true)]
    private ?int $orgUnitId = null;

    /**
     * Unique topic identifier.
     */
    #[ORM\Column(name: 'TopicId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $topicId = null;

    /**
     * Unique discussion forum identifier.
     */
    #[ORM\Column(name: 'ForumId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $forumId = null;

    /**
     * Name of the discussion topic.
     */
    #[ORM\Column(name: 'Name', length: 2000, nullable: true)]
    private ?string $name = null;

    /**
     * Description of the discussion topic. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 2000, nullable: true)]
    private ?string $description = null;

    /**
     * Indicates that a user must post in the discussion topic in order to participate in any discussion threads.
     */
    #[ORM\Column(name: 'MustPostToParticipate', nullable: true)]
    private ?bool $mustPostToParticipate = null;

    /**
     * Indicates whether there is anonymous posting permitted for the discussion topic.
     */
    #[ORM\Column(name: 'AllowAnon', nullable: true)]
    private ?bool $allowAnon = null;

    /**
     * Indicates whether the discussion topic is hidden.
     */
    #[ORM\Column(name: 'IsHidden', nullable: true)]
    private ?bool $isHidden = null;

    /**
     * Indicates that the discussion topic requires approval from a moderator before contributions to the forum are
     * posted.
     */
    #[ORM\Column(name: 'RequiresApproval', nullable: true)]
    private ?bool $requiresApproval = null;

    /**
     * Indicates the last time a post was made to the discussion topic (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastPostDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastPostDate = null;

    /**
     * Indicates the last user who made a post to the discussion topic. Field can be null.
     */
    #[ORM\Column(name: 'LastPostUserId', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $lastPostUserId = null;

    /**
     * Indicates the number of views on the discussion topic.
     */
    #[ORM\Column(name: 'NumViews', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $numViews = null;

    /**
     * Display sort order used for the content objects.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates if the discussion topic is deleted. Field can be null.
     */
    #[ORM\Column(name: 'IsDeleted', nullable: true)]
    private ?bool $isDeleted = null;

    /**
     * Date when the discussion topic was deleted (UTC). Field can be null.
     */
    #[ORM\Column(name: 'DeletedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deletedDate = null;

    /**
     * User who deleted the discussion topic. Field can be null.
     */
    #[ORM\Column(name: 'DeletedByUserId', precision: 10, nullable: true)]
    private ?int $deletedByUserId = null;

    /**
     * Unique grade identifier. Field can be null.
     */
    #[ORM\Column(name: 'GradeItemId', precision: 10, nullable: true)]
    private ?int $gradeItemId = null;

    /**
     * Topic score used to evaluate the discussion thread. Field can be null. Note: Score can exceed ScoreOutOf.
     */
    #[ORM\Column(name: 'ScoreOutOf', nullable: true)]
    private ?float $scoreOutOf = null;

    /**
     * Method used to calculate score. Strings are predefined, with the following values:Average - Calculates the score
     * from the average score of each post in the topic made by a user. Max - Calculates the score based on the maximum
     * score of any one post in the topic for a user.Min - Calculates the score based on the minimum score of any one
     * post in the topic for a user.Mode Max - Given the number of posts, selects the score that is repeated the most.
     * If there is a tie, it takes the highest score.Mode Min - Given the number of posts, selects the score that is
     * repeated the most. If there is a tie, it takes the lowest score.Sum - Calculates the score from the sum of scores
     * on each post in a topic for a user.Blank value (null) - The score is not calculated based on the scores of each
     * post (Manual updates).
     */
    #[ORM\Column(name: 'ScoreCalculationMethod', length: 38, nullable: true)]
    private ?string $scoreCalculationMethod = null;

    /**
     * Indicates whether to include non-scored values. True posts that have not been scored are scored as 0. Otherwise,
     * posts without a score are not included in the score aggregate (defined in the ScoreCalculationType).
     */
    #[ORM\Column(name: 'IncludeNonScoredValues', nullable: true)]
    private ?bool $includeNonScoredValues = null;

    /**
     * Indicates the version of the row. This information is used to determine which table row occurred first, similar
     * to the way time stamps function in other data sets.
     */
    #[ORM\Column(name: 'Version', type: Types::BIGINT, precision: 20, nullable: true)]
    private ?string $version = null;

    /**
     * Unique release condition result identifier. Field can be null.
     */
    #[ORM\Column(name: 'ResultId', precision: 10, nullable: true)]
    private ?int $resultId = null;

    /**
     * First date when learners can post to the topic (UTC). Field can be null.
     */
    #[ORM\Column(name: 'StartDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    /**
     * Before the StartDate, this type determines whether learners can view or access the discussion topic. Refer to
     * About Availability type for details. Field can be null.
     */
    #[ORM\Column(name: 'StartDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $startDateAvailabilityType = null;

    /**
     * Last date when learners can post to the topic (UTC). Field can be null.
     */
    #[ORM\Column(name: 'EndDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * After the EndDate, this type determines whether learners can view or access the discussion topic. Refer to About
     * Availability type for details. Field can be null.
     */
    #[ORM\Column(name: 'EndDateAvailabilityType', type: Types::SMALLINT, precision: 5, nullable: true)]
    private ?int $endDateAvailabilityType = null;

    /**
     * Indicates whether D2L Lumi (Brightspace AI) capabilities were used and the level of AI involvement. Possible
     * values: 0 - No AI capabilities were involved. 1 - Generated by AI and reviewed by a human. 2 - Generated by AI
     * and edited by a human. 3 - Assisted or uplifted by AI.
     */
    #[ORM\Column(name: 'AIUtilization', precision: 10, nullable: true)]
    private ?int $aIUtilization = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
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

    public function getTopicId(): ?string
    {
        return $this->topicId;
    }

    public function setTopicId(string $topicId): static
    {
        $this->topicId = $topicId;

        return $this;
    }

    public function getForumId(): ?string
    {
        return $this->forumId;
    }

    public function setForumId(?string $forumId): static
    {
        $this->forumId = $forumId;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isMustPostToParticipate(): ?bool
    {
        return $this->mustPostToParticipate;
    }

    public function setMustPostToParticipate(?bool $mustPostToParticipate): static
    {
        $this->mustPostToParticipate = $mustPostToParticipate;

        return $this;
    }

    public function isAllowAnon(): ?bool
    {
        return $this->allowAnon;
    }

    public function setAllowAnon(?bool $allowAnon): static
    {
        $this->allowAnon = $allowAnon;

        return $this;
    }

    public function isHidden(): ?bool
    {
        return $this->isHidden;
    }

    public function setHidden(?bool $isHidden): static
    {
        $this->isHidden = $isHidden;

        return $this;
    }

    public function isRequiresApproval(): ?bool
    {
        return $this->requiresApproval;
    }

    public function setRequiresApproval(?bool $requiresApproval): static
    {
        $this->requiresApproval = $requiresApproval;

        return $this;
    }

    public function getLastPostDate(): ?\DateTimeImmutable
    {
        return $this->lastPostDate;
    }

    public function setLastPostDate(?\DateTimeImmutable $lastPostDate): static
    {
        $this->lastPostDate = $lastPostDate;

        return $this;
    }

    public function getLastPostUserId(): ?string
    {
        return $this->lastPostUserId;
    }

    public function setLastPostUserId(?string $lastPostUserId): static
    {
        $this->lastPostUserId = $lastPostUserId;

        return $this;
    }

    public function getNumViews(): ?string
    {
        return $this->numViews;
    }

    public function setNumViews(?string $numViews): static
    {
        $this->numViews = $numViews;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

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

    public function getDeletedDate(): ?\DateTimeImmutable
    {
        return $this->deletedDate;
    }

    public function setDeletedDate(?\DateTimeImmutable $deletedDate): static
    {
        $this->deletedDate = $deletedDate;

        return $this;
    }

    public function getDeletedByUserId(): ?int
    {
        return $this->deletedByUserId;
    }

    public function setDeletedByUserId(?int $deletedByUserId): static
    {
        $this->deletedByUserId = $deletedByUserId;

        return $this;
    }

    public function getGradeItemId(): ?int
    {
        return $this->gradeItemId;
    }

    public function setGradeItemId(?int $gradeItemId): static
    {
        $this->gradeItemId = $gradeItemId;

        return $this;
    }

    public function getScoreOutOf(): ?float
    {
        return $this->scoreOutOf;
    }

    public function setScoreOutOf(?float $scoreOutOf): static
    {
        $this->scoreOutOf = $scoreOutOf;

        return $this;
    }

    public function getScoreCalculationMethod(): ?string
    {
        return $this->scoreCalculationMethod;
    }

    public function setScoreCalculationMethod(?string $scoreCalculationMethod): static
    {
        $this->scoreCalculationMethod = $scoreCalculationMethod;

        return $this;
    }

    public function isIncludeNonScoredValues(): ?bool
    {
        return $this->includeNonScoredValues;
    }

    public function setIncludeNonScoredValues(?bool $includeNonScoredValues): static
    {
        $this->includeNonScoredValues = $includeNonScoredValues;

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

    public function getResultId(): ?int
    {
        return $this->resultId;
    }

    public function setResultId(?int $resultId): static
    {
        $this->resultId = $resultId;

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

    public function getStartDateAvailabilityType(): ?int
    {
        return $this->startDateAvailabilityType;
    }

    public function setStartDateAvailabilityType(?int $startDateAvailabilityType): static
    {
        $this->startDateAvailabilityType = $startDateAvailabilityType;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEndDateAvailabilityType(): ?int
    {
        return $this->endDateAvailabilityType;
    }

    public function setEndDateAvailabilityType(?int $endDateAvailabilityType): static
    {
        $this->endDateAvailabilityType = $endDateAvailabilityType;

        return $this;
    }

    public function getAIUtilization(): ?int
    {
        return $this->aIUtilization;
    }

    public function setAIUtilization(?int $aIUtilization): static
    {
        $this->aIUtilization = $aIUtilization;

        return $this;
    }
}
