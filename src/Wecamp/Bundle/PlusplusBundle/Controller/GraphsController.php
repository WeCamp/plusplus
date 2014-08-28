<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Service\SharedForms;

class GraphsController extends Controller
{
    public function displayAction()
    {
        $subjects = $this->getDoctrineService()->getSubjectRepository()->findAll();
        return $this->render('WecampPlusplusBundle:Graphs:trends.html.twig', array(
                'subjects' => $subjects,
                'form' => $this->getSharedForms()->getSubjectSelectForm()->createView()
            )
        );
    }

    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }

    /**
     * @return SharedForms
     */
    private function getSharedForms()
    {
        return $this->container->get('wecamp_plusplus.form');
    }
}
