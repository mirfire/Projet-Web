<?php
namespace Exia\PortfolioBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class SkillCategory
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
     * @ORM\OneToMany(targetEntity="Exia\PortfolioBundle\Entity\Skill", mappedBy="skillCategory")
     */
    private $skill;

    /**
     * @ORM\ManyToOne(targetEntity="Exia\PortfolioBundle\Entity\User", inversedBy="skillCategory")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skill = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SkillCategory
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
     * Add skill
     *
     * @param \Exia\PortfolioBundle\Entity\Skill $skill
     * @return SkillCategory
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
     * Set user
     *
     * @param \Exia\PortfolioBundle\Entity\User $user
     * @return SkillCategory
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
}
