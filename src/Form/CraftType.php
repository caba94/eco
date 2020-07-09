<?php

namespace App\Form;

use App\Entity\Craft;
use App\Entity\Job;
use App\Entity\Raw;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('Qraw1')
            ->add('Qraw2')
            ->add('Qraw3')
            ->add('raw1', EntityType::class, [
                'class' => Raw::class,
                'choice_label' => 'name',
            ])
            ->add('job', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'name',
            ])
            ->add('raw2', EntityType::class, [
                'class' => Raw::class,
                'choice_label' => 'name',
            ])
            ->add('raw3', EntityType::class, [
                'class' => Raw::class,
                'choice_label' => 'name',
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Craft::class,
        ]);
    }
}
