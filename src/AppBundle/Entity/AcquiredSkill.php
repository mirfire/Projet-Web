<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class AcquiredSkill
{
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Skill", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $skill;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Experience", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="experience_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="acquiredSkill")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * Set skill
     *
     * @param \AppBundle\Entity\Skill $skill
     * @return AcquiredSkill
     */
    public function setSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \AppBundle\Entity\Skill 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set experience
     *
     * @param \AppBundle\Entity\Experience $experience
     * @return AcquiredSkill
     */
    public function setExperience(\AppBundle\Entity\Experience $experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return \AppBundle\Entity\Experience 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return AcquiredSkill
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
}
