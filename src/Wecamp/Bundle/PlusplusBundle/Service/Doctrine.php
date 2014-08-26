<?php


namespace Wecamp\Bundle\PlusplusBundle\Service;

use Wecamp\Bundle\PlusplusBundle\Entity\Thing;

class Doctrine {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
       $this->em = $em;
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Entity\ThingRepository
     */
    public function getThingRepository()
    {
        return $this->em->getRepository('WecampPlusplusBundle:Thing');
    }

    /**
     * @param Thing $thing
     */
    public function storeThing(Thing $thing)
    {
        $this->em->persist($thing);
        $this->em->flush($thing);
    }

} 