<?php

namespace App\Form;

use App\Entity\Bus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NumBus')
            ->add('DriverName')
            ->add('SeatNum')
            ->add('BusType')
            ->add('AffCompany')
            ->add('City')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bus::class,
        ]);
    }
}
