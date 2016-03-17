<?php
namespace Exia\PortfolioBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Experience
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
    private $position;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $company;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $location;

    /**
     * @ORM\OneToOne(targetEntity="Exia\PortfolioBundle\Entity\AcquiredSkill", mappedBy="experience")
     */
    private $acquiredSkill;

    /**
     * @ORM\ManyToOne(targetEntity="Exia\PortfolioBundle\Entity\User", inversedBy="experience")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

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
     * @return Experience
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
     * Set position
     *
     * @param string $position
     * @return Experience
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Experience
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Experience
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set acquiredSkill
     *
     * @param \Exia\PortfolioBundle\Entity\AcquiredSkill $acquiredSkill
     * @return Experience
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
     * @return Experience
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
