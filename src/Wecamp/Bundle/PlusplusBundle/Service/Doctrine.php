<?php


namespace Wecamp\Bundle\PlusplusBundle\Service;

use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;
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
     * @return \Wecamp\Bundle\PlusplusBundle\Entity\PlusOneRepository
     */
    public function getPlusoneRepository()
    {
        return $this->em->getRepository('WecampPlusplusBundle:Plusone');
    }

    /**
     * Setting the created datetime and store it
     *
     * @param PlusOne $plusone
     */
    public function storePlusOne(PlusOne $plusone)
    {
        $plusone->setCreated(new \DateTime());
        $this->em->persist($plusone);
        $this->em->flush($plusone);
    }

    /**
     * @param Thing $thing
     */
    public function storeThing(Thing $thing)
    {
        $existing = $this->getThingRepository()->findBy(
            array(
                'name' => $thing->getName()
            )
        );

        if (empty($existing)) {
            $this->em->persist($thing);
            $this->em->flush($thing);
        }
    }

} 