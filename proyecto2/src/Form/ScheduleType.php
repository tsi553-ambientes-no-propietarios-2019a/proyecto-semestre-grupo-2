<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\City;
use App\Entity\Bus;
class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('day')
            ->add('hour')
            ->add('Bus',EntityType::class, [
                'class'=>Bus::class,
                'choice_label'=> 'num_bus'
            ])
            ->add('origin_city',EntityType::class, [
                'class'=>City::class,
                'choice_label'=> 'name'
            ])
            ->add('destiny_city',EntityType::class, [
                'class'=>City::class,
                'choice_label'=> 'name'
            ])
            ->add('Price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
