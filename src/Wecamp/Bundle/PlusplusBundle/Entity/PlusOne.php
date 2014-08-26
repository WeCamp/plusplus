<?php

namespace Wecamp\Bundle\PlusplusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlusOne
 */
class PlusOne
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Wecamp\Bundle\PlusplusBundle\Entity\Thing
     */
    private $thing;


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
     * Set latitude
     *
     * @param string $latitude
     * @return PlusOne
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return PlusOne
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return PlusOne
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set thing
     *
     * @param \Wecamp\Bundle\PlusplusBundle\Entity\Thing $thing
     * @return PlusOne
     */
    public function setThing(\Wecamp\Bundle\PlusplusBundle\Entity\Thing $thing = null)
    {
        $this->thing = $thing;

        return $this;
    }

    /**
     * Get thing
     *
     * @return \Wecamp\Bundle\PlusplusBundle\Entity\Thing 
     */
    public function getThing()
    {
        return $this->thing;
    }
}
