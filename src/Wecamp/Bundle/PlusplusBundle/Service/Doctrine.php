<?php


namespace Wecamp\Bundle\PlusplusBundle\Service;

use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

class Doctrine {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
       $this->em = $em;
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Entity\SubjectRepository
     */
    public function getSubjectRepository()
    {
        return $this->em->getRepository('WecampPlusplusBundle:Subject');
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
     * @param Subject $subject
     */
    public function storeSubject(Subject $subject)
    {
        $existing = $this->getSubjectRepository()->findBy(
            array(
                'name' => $subject->getName()
            )
        );

        if (empty($existing)) {
            $this->em->persist($subject);
            $this->em->flush($subject);
        }
    }

} 