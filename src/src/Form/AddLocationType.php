<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AddLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locationText', TextareaType::class, [
                'label' => 'Text lokace',
            ])
            ->add('position', TextType::class, [
                'label' => 'Pozice (např. 0.1, 0.2)',
            ])
            ->add('isEnding', CheckboxType::class, [
                'label'    => 'Je tato lokace konečná?',
                'required' => false,
            ])
            ->add('options', CollectionType::class, [
                'label'         => 'Možnosti',
                'entry_type'    => TextType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'prototype'     => true,
                'by_reference'  => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
