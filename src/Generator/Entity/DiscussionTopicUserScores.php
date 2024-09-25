<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\DiscussionTopicUserScoresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Discussion Topic User Scores Brightspace Data Set returns the scores a user received for a discussion topic.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4525-discussions-data-sets#discussion-topic-user-scores
 */
#[ORM\Entity(repositoryClass: DiscussionTopicUserScoresRepository::class)]
#[ORM\Table(name: 'D2L_DISCUSSION_TOPIC_USER_SCORE')]
#[UniqueConstraint(name: 'D2L_DISCUSSION_TOPIC_USER_SCORE_PUK', columns: ['UserId', 'TopicId'])]
final class DiscussionTopicUserScores
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique user identifier
     */
    #[ORM\Column(name: 'UserId', precision: 10, nullable: false)]
    private ?int $userId = null;

    /**
     * Unique topic identifier
     */
    #[ORM\Column(name: 'TopicId', type: Types::BIGINT, precision: 20, nullable: false)]
    private ?string $topicId = null;

    /**
     * Topic score. Field can be null.
     */
    #[ORM\Column(name: 'Score', type: Types::DECIMAL, precision: 19, scale: 9, nullable: true)]
    private ?string $score = null;

    /**
     * Indicates if the topic was graded
     */
    #[ORM\Column(name: 'IsGraded', nullable: true)]
    private ?bool $isGraded = null;

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

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

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function isGraded(): ?bool
    {
        return $this->isGraded;
    }

    public function setGraded(?bool $isGraded): static
    {
        $this->isGraded = $isGraded;

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
