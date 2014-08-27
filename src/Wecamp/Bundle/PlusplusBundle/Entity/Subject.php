<?php

namespace Wecamp\Bundle\PlusplusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subject
 */
class Subject
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $plus_ones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plus_ones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Subject
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
     * Add plus_ones
     *
     * @param \Wecamp\Bundle\PlusplusBundle\Entity\PlusOne $plusOnes
     * @return Subject
     */
    public function addPlusOne(\Wecamp\Bundle\PlusplusBundle\Entity\PlusOne $plusOnes)
    {
        $this->plus_ones[] = $plusOnes;

        return $this;
    }

    /**
     * Remove plus_ones
     *
     * @param \Wecamp\Bundle\PlusplusBundle\Entity\PlusOne $plusOnes
     */
    public function removePlusOne(\Wecamp\Bundle\PlusplusBundle\Entity\PlusOne $plusOnes)
    {
        $this->plus_ones->removeElement($plusOnes);
    }

    /**
     * Get plus_ones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlusOnes()
    {
        return $this->plus_ones;
    }
}
