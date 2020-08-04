<?php

namespace App\Form;

use App\Entity\Raw;
use App\Entity\RawCraft;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RawCraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Raw', EntityType::class, [
                'class' => Raw::class,
                'choice_label' => 'name',
            ])
            ->add(
                'quantity',
                null,
                ['attr'=> ['value'=>0]]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RawCraft::class,
        ]);
    }
}
