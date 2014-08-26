<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListController extends Controller
{
    public function listAction()
    {
        return $this->render('WecampPlusplusBundle:List:list.html.twig', array(
                // ...
            )
        );
    }

}
