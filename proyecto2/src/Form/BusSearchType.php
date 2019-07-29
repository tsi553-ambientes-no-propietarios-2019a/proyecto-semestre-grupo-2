<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\City;
class BusSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Origen',EntityType::class, [
                'class'=>City::class,
                'choice_label'=> 'name'
            ])
            ->add('Destino',EntityType::class, [
                'class'=>City::class,
                'choice_label'=> 'name'
            ])
            ->add('Salida',TextType::class)
            ->add('Retorno',TextType::class)
            ->add('Adultos',IntegerType::class)
            ->add('Ninos',IntegerType::class)
            ->add('Buscar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
