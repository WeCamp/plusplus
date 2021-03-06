<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\Service;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Test\FormInterface;

/**
 * Shared form types.
 */
class SharedForms
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;


    /**
     * Constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * Get a form containing a select element for Subjects
     *
     * @param bool $expanded
     * @param bool $multi
     *
     * @return FormInterface
     */
    public function getSubjectSelectForm($expanded=false,$multi=false)
    {
        return $this->formFactory->createNamedBuilder(
                null,
                'form',
                null,
                [
                    'csrf_protection' => false,
                    'attr' => [
                        'class' => 'form-inline'
                    ]
                ]
            )
            ->add(
                'subject',
                'entity',
                [
                    'class' => 'WecampPlusplusBundle:Subject',
                    'property' => 'name',
                    'empty_value' => 'Select a label...',
                    'empty_data' => null,
                    'label' => 'Labels:',
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'multiple' => $multi,
                    'expanded' => $expanded
                ]
            )
            ->getForm();
    }
} 