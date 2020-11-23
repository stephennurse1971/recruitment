<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('wages')
            ->add('accommodation')
            ->add('skipass')
            ->add('equipmenthire')
            ->add('fullboard')
            ->add('date_start')
            ->add('date_end')
            ->add('requirements')
            ->add('languages')
            ->add('employer')
            ->add('category')
            ->add('resort')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
