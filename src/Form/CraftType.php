<?php

namespace App\Form;

use App\Entity\Craft;
use App\Entity\Job;
use App\Entity\Raw;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CraftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('job', EntityType::class, [
                'class' => Job::class,
                'choice_label' => 'name',
            ])
            ->add('rawCrafts', CollectionType::class, [
                'entry_type' => RawCraftType::class,
                'entry_options' => ['label'=> false],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Craft::class,
        ]);
    }
}
