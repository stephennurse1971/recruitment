<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('employer')
            ->add('category')
            ->add('resort')
            ->add('description', TextType::class, [
                'label' => 'Description of role', ])
            ->add('date_start', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add(
                'date_end',
                DateType::class,
                [
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'form-control input-inline js-datepicker',
                        'data-provide' => 'datetimepicker',
                    ],
                ]
            )

            ->add('requirements')
            ->add('languages', ChoiceType::class, [
                'label' => 'Languages required',
                'choices' => [
                    'English' => 'English',
                    'French' => 'French',
                    'German' => 'German',
                ],
            ])
            ->add('wages')
            ->add('accommodation', ChoiceType::class, [
                'label' => 'Is accommodation provided',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
            ->add('skipass', ChoiceType::class, [
                'label' => 'Is a ski pass provided',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
            ->add('equipmenthire', ChoiceType::class, [
                'label' => 'Is ski equipment provided',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
            ->add('fullboard', ChoiceType::class, [
                'label' => 'Is fullboard provided',
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}