<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Entity\Thing;

class ListController extends Controller
{
    public function listAction()
    {
        $things =  $this->getDoctrineService()->getThingRepository()->findAll();
        return $this->render('WecampPlusplusBundle:List:list.html.twig', array(
                'things' => $things
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
