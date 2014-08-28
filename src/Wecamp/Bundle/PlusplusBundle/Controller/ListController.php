<?php

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

class ListController extends Controller
{
    public function listAction()
    {
        /** @var Subject[] $subjectsOrdered */
        $subjectsOrdered = $this->getDoctrineService()->getSubjectRepository()->findBy(
            array(),
            array('name' => 'ASC')
        );
        $currentLetter = null;
        $subjects = array();
        foreach($subjectsOrdered as $subject) {
            $currentLetter = strtoupper(substr($subject->getName(),0,1));
            $subjects[$currentLetter][] = $subject;
        }
        return $this->render('WecampPlusplusBundle:List:list.html.twig', array(
                'subjects' => $subjects,
                'form' => $this->getSubjectForm()->createView()
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

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function getSubjectForm()
    {
        return $this->get('form.factory')->createNamedBuilder(
            null,
            'form',
            null,
            array(
                'csrf_protection' => false,
                'attr' => array(
                    'class' => 'bobs-form-layout form-inline input-group'

                )
            )
        )
            ->add('submit', 'submit', array(
                    'label' => 'Add Subject',
                    'attr' => array(
                        'class' => 'btn btn-default'
                    )
                )
            )
            ->add('name', 'text', array(
                    'label_attr' => array(
                        'class' => 'hide',
                    ),
                    'attr'=>
                        array(
                            'class'=>'form-control',
                            'placeholder' => 'Name'
                        ),
                )
            )

            ->getForm();
    }
}
