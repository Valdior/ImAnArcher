<?php

namespace App\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;


class DateType extends \Symfony\Component\Form\Extension\Core\Type\DateType
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