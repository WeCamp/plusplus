<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LabelController extends Controller
{
    public function addAction()
    {
        return $this->render('WecampPlusplusBundle:Label:add.html.twig', array(
                // ...
            ));
    }

}
