<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Wecamp\Bundle\PlusplusBundle\Entity\Thing;

class LabelController extends Controller
{
    public function addAction()
    {
        return $this->render('WecampPlusplusBundle:Label:add.html.twig', array(
                // ...
            ));
    }

    public function createAction($thingieName)
    {
        $thing = new Thing();
        $thing->setName($thingieName);

        $this->getDoctrineService()->storeThing($thing);
        $data = "Thingie has been stored";
        return new JsonResponse($data);
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Service\Doctrine
     */
    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }
}
