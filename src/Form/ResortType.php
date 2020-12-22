<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Resort;
use App\Repository\CountryRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resort')
            ->add('map_link')
            ->add('description')
            ->add('country',EntityType::class,
                [
                    'class'=>Country::class,
                    'query_builder'=>function(EntityRepository $entityRepository){
                     return $entityRepository->createQueryBuilder('c')
                             ->andWhere('c.include_resort = true');
                    }
                ])

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resort::class,
        ]);
    }
}
