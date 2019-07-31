<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Paquetes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaquetesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('duration')
            ->add('date')
            ->add('extras')
            ->add('description')
            ->add('price') 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Paquetes::class,
        ]);
    }
}
