<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\NotBlank(message="Merci d'entrer votre nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Votre nom est trop court.",
     *     maxMessage="Votre nom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\NotBlank(message="Merci d'entrer votre prénom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Votre prénom est trop court.",
     *     maxMessage="Votre prénom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $surname;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $address;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $zip_code;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $phone;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $theme;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Project", mappedBy="user")
     */
    protected $project;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Skill", mappedBy="user")
     */
    protected $skill;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SkillCategory", mappedBy="user")
     */
    protected $skillCategory;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Course", mappedBy="user")
     */
    protected $course;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Experience", mappedBy="user")
     */
    protected $experience;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AcquiredSkill", mappedBy="user")
     */
    protected $acquiredSkill;
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->skill = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skillCategory = new \Doctrine\Common\Collections\ArrayCollection();
        $this->course = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
        $this->acquiredSkill = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip_code
     *
     * @param integer $zipCode
     * @return User
     */
    public function setZipCode($zipCode)
    {
        $this->zip_code = $zipCode;

        return $this;
    }

    /**
     * Get zip_code
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     * @return User
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add skill
     *
     * @param \AppBundle\Entity\Skill $skill
     * @return User
     */
    public function addSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skill[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \AppBundle\Entity\Skill $skill
     */
    public function removeSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skill->removeElement($skill);
    }

    /**
     * Get skill
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Add skillCategory
     *
     * @param \AppBundle\Entity\SkillCategory $skillCategory
     * @return User
     */
    public function addSkillCategory(\AppBundle\Entity\SkillCategory $skillCategory)
    {
        $this->skillCategory[] = $skillCategory;

        return $this;
    }

    /**
     * Remove skillCategory
     *
     * @param \AppBundle\Entity\SkillCategory $skillCategory
     */
    public function removeSkillCategory(\AppBundle\Entity\SkillCategory $skillCategory)
    {
        $this->skillCategory->removeElement($skillCategory);
    }

    /**
     * Get skillCategory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkillCategory()
    {
        return $this->skillCategory;
    }

    /**
     * Add course
     *
     * @param \AppBundle\Entity\Course $course
     * @return User
     */
    public function addCourse(\AppBundle\Entity\Course $course)
    {
        $this->course[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \AppBundle\Entity\Course $course
     */
    public function removeCourse(\AppBundle\Entity\Course $course)
    {
        $this->course->removeElement($course);
    }

    /**
     * Get course
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Add experience
     *
     * @param \AppBundle\Entity\Experience $experience
     * @return User
     */
    public function addExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experience[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \AppBundle\Entity\Experience $experience
     */
    public function removeExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experience->removeElement($experience);
    }

    /**
     * Get experience
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Add acquiredSkill
     *
     * @param \AppBundle\Entity\AcquiredSkill $acquiredSkill
     * @return User
     */
    public function addAcquiredSkill(\AppBundle\Entity\AcquiredSkill $acquiredSkill)
    {
        $this->acquiredSkill[] = $acquiredSkill;

        return $this;
    }

    /**
     * Remove acquiredSkill
     *
     * @param \AppBundle\Entity\AcquiredSkill $acquiredSkill
     */
    public function removeAcquiredSkill(\AppBundle\Entity\AcquiredSkill $acquiredSkill)
    {
        $this->acquiredSkill->removeElement($acquiredSkill);
    }

    /**
     * Get acquiredSkill
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcquiredSkill()
    {
        return $this->acquiredSkill;
    }
}
