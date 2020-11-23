<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('wages')
            ->add('accommodationProvided')
            ->add('skiPassProvided')
            ->add('equipmentProvided')
            ->add('fullBoard')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('requirements')
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
