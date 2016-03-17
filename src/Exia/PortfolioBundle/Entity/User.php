<?php
namespace Exia\PortfolioBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $city;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $phone;

    /**
     * @ORM\OneToOne(targetEntity="Exia\PortfolioBundle\Entity\Project", mappedBy="user")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\Skill", mappedBy="user")
     */
    private $skill;

    /**
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\SkillCategory", mappedBy="user")
     */
    private $skillCategory;

    /**
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\Course", mappedBy="user")
     */
    private $course;

    /**
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\Experience", mappedBy="user")
     */
    private $experience;

    /**
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\AcquiredSkill", mappedBy="user")
     */
    private $acquiredSkill;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skill = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skillCategory = new \Doctrine\Common\Collections\ArrayCollection();
        $this->course = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
        $this->acquiredSkill = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
     * @param \Exia\PortfolioBundle\Entity\Project $project
     * @return User
     */
    public function setProject(\Exia\PortfolioBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Exia\PortfolioBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add skill
     *
     * @param \Exia\PortfolioBundle\Entity\Skill $skill
     * @return User
     */
    public function addSkill(\Exia\PortfolioBundle\Entity\Skill $skill)
    {
        $this->skill[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \Exia\PortfolioBundle\Entity\Skill $skill
     */
    public function removeSkill(\Exia\PortfolioBundle\Entity\Skill $skill)
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
     * @param \Exia\PortfolioBundle\Entity\SkillCategory $skillCategory
     * @return User
     */
    public function addSkillCategory(\Exia\PortfolioBundle\Entity\SkillCategory $skillCategory)
    {
        $this->skillCategory[] = $skillCategory;

        return $this;
    }

    /**
     * Remove skillCategory
     *
     * @param \Exia\PortfolioBundle\Entity\SkillCategory $skillCategory
     */
    public function removeSkillCategory(\Exia\PortfolioBundle\Entity\SkillCategory $skillCategory)
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
     * @param \Exia\PortfolioBundle\Entity\Course $course
     * @return User
     */
    public function addCourse(\Exia\PortfolioBundle\Entity\Course $course)
    {
        $this->course[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \Exia\PortfolioBundle\Entity\Course $course
     */
    public function removeCourse(\Exia\PortfolioBundle\Entity\Course $course)
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
     * @param \Exia\PortfolioBundle\Entity\Experience $experience
     * @return User
     */
    public function addExperience(\Exia\PortfolioBundle\Entity\Experience $experience)
    {
        $this->experience[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Exia\PortfolioBundle\Entity\Experience $experience
     */
    public function removeExperience(\Exia\PortfolioBundle\Entity\Experience $experience)
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
     * @param \Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill
     * @return User
     */
    public function addAcquiredSkill(\Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill)
    {
        $this->acquiredSkill[] = $acquiredSkill;

        return $this;
    }

    /**
     * Remove acquiredSkill
     *
     * @param \Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill
     */
    public function removeAcquiredSkill(\Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill)
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
