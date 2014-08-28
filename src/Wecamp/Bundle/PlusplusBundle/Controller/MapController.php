<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
    public function displaySubjectAction()
    {
        return $this->render(
            'WecampPlusplusBundle:Map:subject.html.twig'
        );
    }
} 