<?php


namespace Wecamp\Bundle\PlusplusBundle\Service;

use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param $subjectId
     * @param Request $request
     * @return PlusOne
     * @throws \Exception
     */
    public function createPlusOne($subjectId, Request $request)
    {
        $subject = $this->getSubjectRepository()->find($subjectId);
        if (is_null($subject)) {
            throw new \Exception('Subject is not found');
        }

        $plusOne = new PlusOne();
        $plusOne->setSubject($subject);

        if ($this->requestHasLocationData($request)) {
            $plusOne->setLatitude($this->getLatitudeFromRequest($request));
            $plusOne->setLongitude($this->getLongitudeFromRequest($request));
        }

        return $plusOne;
    }

    /**
     * @param $request
     * @return bool
     */
    private function requestHasLocationData($request)
    {
        if (
            is_null($this->getLatitudeFromRequest($request)) ||
            is_null($this->getLongitudeFromRequest($request))
        ) {
            return false;
        }
        return true;
    }

    /**
     * @param Request $request
     * @return double|int|null
     */
    private function getLatitudeFromRequest(Request $request)
    {
        if (filter_var($request->attributes->get('latitude'), FILTER_VALIDATE_FLOAT)) {
            return $request->attributes->get('latitude');
        }
        return null;
    }

    /**
     * @param Request $request
     * @return double|int|null
     */
    private function getLongitudeFromRequest(Request $request)
    {
        if (filter_var($request->attributes->get('longitude'), FILTER_VALIDATE_FLOAT)) {
            return $request->attributes->get('longitude');
        }
        return null;
    }

} 