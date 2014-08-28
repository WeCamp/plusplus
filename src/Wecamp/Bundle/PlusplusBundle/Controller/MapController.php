<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Service\SharedForms;

class MapController extends Controller
{
    public function displaySubjectAction()
    {
        $form = $this->getSharedForms()->getSubjectSelectForm();

        return $this->render(
            'WecampPlusplusBundle:Map:subject.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @return SharedForms
     */
    private function getSharedForms()
    {
        return $this->container->get('wecamp_plusplus.form');
    }
}