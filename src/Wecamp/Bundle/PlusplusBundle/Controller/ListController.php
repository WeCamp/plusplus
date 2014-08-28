<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

class ListController extends Controller
{
    public function listAction()
    {
        $subjects = $this->getDoctrineService()->getSubjectRepository()->findBy(array(), array('name' => 'ASC'));
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
