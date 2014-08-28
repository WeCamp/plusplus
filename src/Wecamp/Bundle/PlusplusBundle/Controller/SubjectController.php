<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

class SubjectController extends Controller
{
    public function addAction()
    {
        return $this->render(
            'WecampPlusplusBundle:Subject:add.html.twig',
            [
                'form' => $this->getSubjectForm()->createView()
            ]
        );
    }

    public function createAction(Request $request)
    {
        $subject = new Subject();
        $form = $this->getSubjectForm($subject);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrineService()->storeSubject($subject);
            $data = "Subject has been stored";
        } else {
            $data = $form->getErrors();
        }

        return new JsonResponse($data);
    }

    public function plusoneAction(Request $request)
    {
        $plusOne = $this->getDoctrineService()->createPlusOne($request->request->get('subjectId'), $request);
        $this->getDoctrineService()->storePlusOne($plusOne);
        return new JsonResponse($plusOne);
    }

    /**
     * @param Subject|null $subject
     * @return \Symfony\Component\Form\Form
     */
    private function getSubjectForm(Subject $subject = null)
    {
        return $this->get('form.factory')->createNamedBuilder(
            null,
            'form',
            $subject,
            array(
                'csrf_protection' => false,
                'attr' => array(
                    'class' => 'form-horizontal'
                )
            )
        )
        ->add('name', 'text', array(
            'attr'=>
                array(
                    'class'=>'form-control',
                ),
            )
        )
        ->add('submit', 'submit', array(
            'label' => 'Add Subject',
            'attr' => array(
                'class' => 'btn btn-default'
                )
            )
        )
        ->getForm();
    }

    /**
     * Get a list of plus ones for a subject.
     *
     * @throws NotFoundHttpException
     *
     * @param int $subjectId
     *
     * @return Response
     */
    public function getPlusOnesAction($subjectId)
    {
        $subjectRepo = $this->getDoctrineService()->getSubjectRepository();

        /** @var Subject $subject */
        $subject = $subjectRepo->findOneById($subjectId);
        if (is_null($subject)) {
            throw new NotFoundHttpException();
        }

        $jsonBody = [];

        /** @var PlusOne $plusOne */
        foreach ($subject->getPlusOnes() as $plusOne) {
            $jsonBody[] = [
                'created' => $plusOne->getCreated()->format('c'),
                'latitude' => $plusOne->getLatitude(),
                'longitude' => $plusOne->getLongitude()
            ];
        }

        return new JsonResponse($jsonBody);
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Service\Doctrine
     */
    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }
}
