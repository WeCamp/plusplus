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

    public function createAction(Request $request)
    {
        $thing = new Thing();
        $form = $this->getThingForm($thing);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrineService()->storeThing($thing);
            $data = "Thingie has been stored";
        } else {
            $data = $form->getErrors();
        }

        return new JsonResponse($data);
    }

    /**
     * @param Thing $thing
     * @return \Symfony\Component\Form\Form
     */
    private function getThingForm(Thing $thing)
    {
        return $this->get('form.factory')->createNamedBuilder(
            null,
            'form',
            $thing,
            array(
                'csrf_protection' => false
            )
        )
        ->add('name', 'text')
        ->getForm();
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Service\Doctrine
     */
    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }
}
