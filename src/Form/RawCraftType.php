<?php

namespace App\Form;

use App\Entity\RawCraft;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RawCraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('Raw', CollectionType::class, [
                'entry_type' => RawType::class,
                'entry_options' => ['label' => 'name']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RawCraft::class,
        ]);
    }
}
