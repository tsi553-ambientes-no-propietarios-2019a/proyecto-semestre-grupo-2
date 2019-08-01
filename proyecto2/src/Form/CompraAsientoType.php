<?php

namespace App\Form;

use App\Entity\Compra;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompraAsientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_com')
            ->add('no_asientos')
            ->add('total_asientos')
            ->add('no_habita')
            ->add('total_paquetes')
            ->add('no_paquetes')
            ->add('total_habita')
            ->add('total_compra')
            ->add('user')
            ->add('paquete')
            ->add('habitacion')
            ->add('schedule')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compra::class,
        ]);
    }
}
