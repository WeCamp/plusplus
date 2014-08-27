<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

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
        $subject = new Subject();
        $form = $this->getSubjectForm($subject);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrineService()->storeSubject($subject);
            $data = "Subjectie has been stored";
        } else {
            $data = $form->getErrors();
        }

        return new JsonResponse($data);
    }

    /**
     * @param Subject $subject
     * @return \Symfony\Component\Form\Form
     */
    private function getSubjectForm(Subject $subject)
    {
        return $this->get('form.factory')->createNamedBuilder(
            null,
            'form',
            $subject,
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
