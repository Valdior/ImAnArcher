<?php

namespace App\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;


class BirthdayType extends \Symfony\Component\Form\Extension\Core\Type\BirthdayType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'html5' => false,
            'widget' => 'single_text',
            'attr' => [
                'is' => 'date-picker'
            ]
        ]);
    }
}