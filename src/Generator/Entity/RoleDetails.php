<?php

declare(strict_types=1);

namespace Brightspace\Bds\Schema\Generator\Entity;

use Brightspace\Bds\Schema\Generator\Repository\RoleDetailsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * The Role Details Brightspace Data Set returns a full set of attributes for each role in your organization.
 *
 * @see https://community.d2l.com/brightspace/kb/articles/4534-role-details-data-sets#role-details
 */
#[ORM\Entity(repositoryClass: RoleDetailsRepository::class)]
#[ORM\Table(name: 'D2L_ROLE_DETAIL')]
#[UniqueConstraint(name: 'D2L_ROLE_DETAIL_PUK', columns: ['RoleId'])]
final class RoleDetails
{
    #[ORM\Id]
    #[ORM\Column(name: 'BDSRecordId', type: Types::STRING, length: 48)]
    private ?string $bdsRecordId = null;

    /**
     * Unique role identifier.
     */
    #[ORM\Column(name: 'RoleId', precision: 10, nullable: false)]
    private ?int $roleId = null;

    /**
     * Name of the role.
     */
    #[ORM\Column(name: 'RoleName', length: 240, nullable: true)]
    private ?string $roleName = null;

    /**
     * Description of the role. Field can be null.
     */
    #[ORM\Column(name: 'Description', length: 800, nullable: true)]
    private ?string $description = null;

    /**
     * Attribute indicating that the role cascades from other roles.
     */
    #[ORM\Column(name: 'IsCascading', nullable: true)]
    private ?bool $isCascading = null;

    /**
     * Attribute indicating that users with this role appear in class lists.
     */
    #[ORM\Column(name: 'InClassList', nullable: true)]
    private ?bool $inClassList = null;

    /**
     * Attribute indicating the role name for users that appear in class lists. Field can be null.
     */
    #[ORM\Column(name: 'ClassListRoleName', length: 240, nullable: true)]
    private ?string $classListRoleName = null;

    /**
     * Attribute indicating that members of this role can see groups consisting of learners in the class list.
     */
    #[ORM\Column(name: 'ClassListShowGroups', nullable: true)]
    private ?bool $classListShowGroups = null;

    /**
     * Attribute indicating that members of this role can see sections consisting of learners in the class list.
     */
    #[ORM\Column(name: 'ClassListShowSections', nullable: true)]
    private ?bool $classListShowSections = null;

    /**
     * Attribute indicating that members of this role appear in the class list with the role displayed.
     */
    #[ORM\Column(name: 'ClassListDisplayRole', nullable: true)]
    private ?bool $classListDisplayRole = null;

    /**
     * Attribute indicating that the role can access inactive course offerings.
     */
    #[ORM\Column(name: 'AccessInactiveCO', nullable: true)]
    private ?bool $accessInactiveCO = null;

    /**
     * Attribute indicating that the role has special access to courses.
     */
    #[ORM\Column(name: 'HasSpecialAccess', nullable: true)]
    private ?bool $hasSpecialAccess = null;

    /**
     * Attribute indicating that the role appears in the course offering group.
     */
    #[ORM\Column(name: 'AddToCourseOfferingGroups', nullable: true)]
    private ?bool $addToCourseOfferingGroups = null;

    /**
     * Attribute indicating that the role can be automatically enrolled into groups in a class.
     */
    #[ORM\Column(name: 'CanBeAutoEnrolledIntoGroups', nullable: true)]
    private ?bool $canBeAutoEnrolledIntoGroups = null;

    /**
     * Attribute indicating that users with this role can be added to course offering sections.
     */
    #[ORM\Column(name: 'AddToCourseOfferingSections', nullable: true)]
    private ?bool $addToCourseOfferingSections = null;

    /**
     * Attribute indicating that users with this role can be automatically enrolled into course sections.
     */
    #[ORM\Column(name: 'CanBeAutoEnrolledIntoSections', nullable: true)]
    private ?bool $canBeAutoEnrolledIntoSections = null;

    /**
     * Attribute indicating that this role can access past courses.
     */
    #[ORM\Column(name: 'AccessPastCourses', nullable: true)]
    private ?bool $accessPastCourses = null;

    /**
     * Attribute indicating that this role can access courses that have not yet started.
     */
    #[ORM\Column(name: 'AccessFutureCourses', nullable: true)]
    private ?bool $accessFutureCourses = null;

    /**
     * Indicates the sort order for users with this role.
     */
    #[ORM\Column(name: 'SortOrder', precision: 10, nullable: true)]
    private ?int $sortOrder = null;

    /**
     * Indicates that this role should appear in Content.
     */
    #[ORM\Column(name: 'ShowInContent', nullable: true)]
    private ?bool $showInContent = null;

    /**
     * Indicates that this role should appear in Discussions assessments.
     */
    #[ORM\Column(name: 'ShowInDiscussionAssess', nullable: true)]
    private ?bool $showInDiscussionAssess = null;

    /**
     * Indicates that this role should appear in Discussions statistics.
     */
    #[ORM\Column(name: 'ShowInDiscussionStats', nullable: true)]
    private ?bool $showInDiscussionStats = null;

    /**
     * Indicates that this role should appear in Grades.
     */
    #[ORM\Column(name: 'ShowInGrades', nullable: true)]
    private ?bool $showInGrades = null;

    /**
     * Indicates that this role should appear in Attendance.
     */
    #[ORM\Column(name: 'ShowInAttendance', nullable: true)]
    private ?bool $showInAttendance = null;

    /**
     * Indicates that this role should have permission to self-enroll in groups.
     */
    #[ORM\Column(name: 'AllowSelfEnrollInGroups', nullable: true)]
    private ?bool $allowSelfEnrollInGroups = null;

    /**
     * Indicates that this role should appear in registration information for a course.
     */
    #[ORM\Column(name: 'ShowInRegistration', nullable: true)]
    private ?bool $showInRegistration = null;

    /**
     * Indicates that this role should appear in User Progress.
     */
    #[ORM\Column(name: 'ShowInUserProgress', nullable: true)]
    private ?bool $showInUserProgress = null;

    /**
     * Indicates the alias for this role. Field can be null.
     */
    #[ORM\Column(name: 'RoleAlias', length: 240, nullable: true)]
    private ?string $roleAlias = null;

    /**
     * Code assigned to each role for mapping to other systems or organizations. Field can be null.
     */
    #[ORM\Column(name: 'RoleCode', length: 200, nullable: true)]
    private ?string $roleCode = null;

    /**
     * Date and time when the role was last modified (UTC). Field can be null.
     */
    #[ORM\Column(name: 'LastModifiedDate', type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastModifiedDate = null;

    /**
     * User identifier of the user that deleted the role. Field can be null.
     */
    #[ORM\Column(name: 'DeletedBy', precision: 10, nullable: true)]
    private ?int $deletedBy = null;

    public function getBDSRecordId(): ?string
    {
        return $this->bdsRecordId;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): static
    {
        $this->roleId = $roleId;

        return $this;
    }

    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    public function setRoleName(?string $roleName): static
    {
        $this->roleName = $roleName;

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

    public function isCascading(): ?bool
    {
        return $this->isCascading;
    }

    public function setCascading(?bool $isCascading): static
    {
        $this->isCascading = $isCascading;

        return $this;
    }

    public function isInClassList(): ?bool
    {
        return $this->inClassList;
    }

    public function setInClassList(?bool $inClassList): static
    {
        $this->inClassList = $inClassList;

        return $this;
    }

    public function getClassListRoleName(): ?string
    {
        return $this->classListRoleName;
    }

    public function setClassListRoleName(?string $classListRoleName): static
    {
        $this->classListRoleName = $classListRoleName;

        return $this;
    }

    public function isClassListShowGroups(): ?bool
    {
        return $this->classListShowGroups;
    }

    public function setClassListShowGroups(?bool $classListShowGroups): static
    {
        $this->classListShowGroups = $classListShowGroups;

        return $this;
    }

    public function isClassListShowSections(): ?bool
    {
        return $this->classListShowSections;
    }

    public function setClassListShowSections(?bool $classListShowSections): static
    {
        $this->classListShowSections = $classListShowSections;

        return $this;
    }

    public function isClassListDisplayRole(): ?bool
    {
        return $this->classListDisplayRole;
    }

    public function setClassListDisplayRole(?bool $classListDisplayRole): static
    {
        $this->classListDisplayRole = $classListDisplayRole;

        return $this;
    }

    public function isAccessInactiveCO(): ?bool
    {
        return $this->accessInactiveCO;
    }

    public function setAccessInactiveCO(?bool $accessInactiveCO): static
    {
        $this->accessInactiveCO = $accessInactiveCO;

        return $this;
    }

    public function hasSpecialAccess(): ?bool
    {
        return $this->hasSpecialAccess;
    }

    public function setHasSpecialAccess(?bool $hasSpecialAccess): static
    {
        $this->hasSpecialAccess = $hasSpecialAccess;

        return $this;
    }

    public function isAddToCourseOfferingGroups(): ?bool
    {
        return $this->addToCourseOfferingGroups;
    }

    public function setAddToCourseOfferingGroups(?bool $addToCourseOfferingGroups): static
    {
        $this->addToCourseOfferingGroups = $addToCourseOfferingGroups;

        return $this;
    }

    public function isCanBeAutoEnrolledIntoGroups(): ?bool
    {
        return $this->canBeAutoEnrolledIntoGroups;
    }

    public function setCanBeAutoEnrolledIntoGroups(?bool $canBeAutoEnrolledIntoGroups): static
    {
        $this->canBeAutoEnrolledIntoGroups = $canBeAutoEnrolledIntoGroups;

        return $this;
    }

    public function isAddToCourseOfferingSections(): ?bool
    {
        return $this->addToCourseOfferingSections;
    }

    public function setAddToCourseOfferingSections(?bool $addToCourseOfferingSections): static
    {
        $this->addToCourseOfferingSections = $addToCourseOfferingSections;

        return $this;
    }

    public function isCanBeAutoEnrolledIntoSections(): ?bool
    {
        return $this->canBeAutoEnrolledIntoSections;
    }

    public function setCanBeAutoEnrolledIntoSections(?bool $canBeAutoEnrolledIntoSections): static
    {
        $this->canBeAutoEnrolledIntoSections = $canBeAutoEnrolledIntoSections;

        return $this;
    }

    public function isAccessPastCourses(): ?bool
    {
        return $this->accessPastCourses;
    }

    public function setAccessPastCourses(?bool $accessPastCourses): static
    {
        $this->accessPastCourses = $accessPastCourses;

        return $this;
    }

    public function isAccessFutureCourses(): ?bool
    {
        return $this->accessFutureCourses;
    }

    public function setAccessFutureCourses(?bool $accessFutureCourses): static
    {
        $this->accessFutureCourses = $accessFutureCourses;

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

    public function isShowInContent(): ?bool
    {
        return $this->showInContent;
    }

    public function setShowInContent(?bool $showInContent): static
    {
        $this->showInContent = $showInContent;

        return $this;
    }

    public function isShowInDiscussionAssess(): ?bool
    {
        return $this->showInDiscussionAssess;
    }

    public function setShowInDiscussionAssess(?bool $showInDiscussionAssess): static
    {
        $this->showInDiscussionAssess = $showInDiscussionAssess;

        return $this;
    }

    public function isShowInDiscussionStats(): ?bool
    {
        return $this->showInDiscussionStats;
    }

    public function setShowInDiscussionStats(?bool $showInDiscussionStats): static
    {
        $this->showInDiscussionStats = $showInDiscussionStats;

        return $this;
    }

    public function isShowInGrades(): ?bool
    {
        return $this->showInGrades;
    }

    public function setShowInGrades(?bool $showInGrades): static
    {
        $this->showInGrades = $showInGrades;

        return $this;
    }

    public function isShowInAttendance(): ?bool
    {
        return $this->showInAttendance;
    }

    public function setShowInAttendance(?bool $showInAttendance): static
    {
        $this->showInAttendance = $showInAttendance;

        return $this;
    }

    public function isAllowSelfEnrollInGroups(): ?bool
    {
        return $this->allowSelfEnrollInGroups;
    }

    public function setAllowSelfEnrollInGroups(?bool $allowSelfEnrollInGroups): static
    {
        $this->allowSelfEnrollInGroups = $allowSelfEnrollInGroups;

        return $this;
    }

    public function isShowInRegistration(): ?bool
    {
        return $this->showInRegistration;
    }

    public function setShowInRegistration(?bool $showInRegistration): static
    {
        $this->showInRegistration = $showInRegistration;

        return $this;
    }

    public function isShowInUserProgress(): ?bool
    {
        return $this->showInUserProgress;
    }

    public function setShowInUserProgress(?bool $showInUserProgress): static
    {
        $this->showInUserProgress = $showInUserProgress;

        return $this;
    }

    public function getRoleAlias(): ?string
    {
        return $this->roleAlias;
    }

    public function setRoleAlias(?string $roleAlias): static
    {
        $this->roleAlias = $roleAlias;

        return $this;
    }

    public function getRoleCode(): ?string
    {
        return $this->roleCode;
    }

    public function setRoleCode(?string $roleCode): static
    {
        $this->roleCode = $roleCode;

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

    public function getDeletedBy(): ?int
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?int $deletedBy): static
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }
}
