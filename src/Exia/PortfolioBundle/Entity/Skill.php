<?php
namespace Exia\PortfolioBundle\Entity;
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
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    private $level;

    /**
     * @ORM\OneToOne(targetEntity="Exia\PortfolioBundle\Entity\AcquiredSkill", mappedBy="skill")
     */
    private $acquiredSkill;

    /**
     * @ORM\ManyToOne(targetEntity="Exia\PortfolioBundle\Entity\User", inversedBy="skill")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Exia\PortfolioBundle\Entity\SkillCategory", inversedBy="skill")
     * @ORM\JoinColumn(name="skill_category_id", referencedColumnName="id", nullable=false)
     */
    private $skillCategory;

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
     * @param \Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill
     * @return Skill
     */
    public function setAcquiredSkill(\Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill = null)
    {
        $this->acquiredSkill = $acquiredSkill;

        return $this;
    }

    /**
     * Get acquiredSkill
     *
     * @return \Exia\PortfolioBundle\Entity\AcquiredSkill 
     */
    public function getAcquiredSkill()
    {
        return $this->acquiredSkill;
    }

    /**
     * Set user
     *
     * @param \Exia\PortfolioBundle\Entity\User $user
     * @return Skill
     */
    public function setUser(\Exia\PortfolioBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Exia\PortfolioBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set skillCategory
     *
     * @param \Exia\PortfolioBundle\Entity\SkillCategory $skillCategory
     * @return Skill
     */
    public function setSkillCategory(\Exia\PortfolioBundle\Entity\SkillCategory $skillCategory)
    {
        $this->skillCategory = $skillCategory;

        return $this;
    }

    /**
     * Get skillCategory
     *
     * @return \Exia\PortfolioBundle\Entity\SkillCategory 
     */
    public function getSkillCategory()
    {
        return $this->skillCategory;
    }
}
