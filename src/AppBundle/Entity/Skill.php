<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $level;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\AcquiredSkill", mappedBy="skill")
     */
    protected $acquiredSkill;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="skill")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SkillCategory", inversedBy="skill")
     * @ORM\JoinColumn(name="skill_category_id", referencedColumnName="id", nullable=false)
     */
    protected $skillCategory;

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
     * @return Skill
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
     * Set level
     *
     * @param integer $level
     * @return Skill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set acquiredSkill
     *
     * @param \AppBundle\Entity\AcquiredSkill $acquiredSkill
     * @return Skill
     */
    public function setAcquiredSkill(\AppBundle\Entity\AcquiredSkill $acquiredSkill = null)
    {
        $this->acquiredSkill = $acquiredSkill;

        return $this;
    }

    /**
     * Get acquiredSkill
     *
     * @return \AppBundle\Entity\AcquiredSkill 
     */
    public function getAcquiredSkill()
    {
        return $this->acquiredSkill;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Skill
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set skillCategory
     *
     * @param \AppBundle\Entity\SkillCategory $skillCategory
     * @return Skill
     */
    public function setSkillCategory(\AppBundle\Entity\SkillCategory $skillCategory)
    {
        $this->skillCategory = $skillCategory;

        return $this;
    }

    /**
     * Get skillCategory
     *
     * @return \AppBundle\Entity\SkillCategory 
     */
    public function getSkillCategory()
    {
        return $this->skillCategory;
    }
}
