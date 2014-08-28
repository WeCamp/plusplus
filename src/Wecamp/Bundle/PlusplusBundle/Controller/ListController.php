<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

class ListController extends Controller
{
    public function listAction()
    {
        /** @var Subject[] $subjectsOrdered */
        $subjectsOrdered = $this->getDoctrineService()->getSubjectRepository()->findBy(
            array(),
            array('name' => 'ASC')
        );
        $currentLetter = null;
        $subjects = array();
        foreach($subjectsOrdered as $subject) {
            $currentLetter = substr($subject->getName(),0,1);
            $subjects[$currentLetter][] = $subject;
        }
        return $this->render('WecampPlusplusBundle:List:list.html.twig', array(
                'subjects' => $subjects
            )
        );
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Service\Doctrine
     */
    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }
}
