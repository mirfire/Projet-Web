<?php
namespace Exia\PortfolioBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class AcquiredSkill
{
    /**
     * @ORM\OneToOne(targetEntity="Exia\PortfolioBundle\Entity\Skill", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $skill;

    /**
     * @ORM\OneToOne(targetEntity="Exia\PortfolioBundle\Entity\Experience", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="experience_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="Exia\PortfolioBundle\Entity\User", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * Set skill
     *
     * @param \Exia\PortfolioBundle\Entity\Skill $skill
     * @return AcquiredSkill
     */
    public function setSkill(\Exia\PortfolioBundle\Entity\Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Exia\PortfolioBundle\Entity\Skill 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set experience
     *
     * @param \Exia\PortfolioBundle\Entity\Experience $experience
     * @return AcquiredSkill
     */
    public function setExperience(\Exia\PortfolioBundle\Entity\Experience $experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return \Exia\PortfolioBundle\Entity\Experience 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set user
     *
     * @param \Exia\PortfolioBundle\Entity\User $user
     * @return AcquiredSkill
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
