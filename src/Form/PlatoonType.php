<?php

namespace App\Form;

use App\Entity\Platoon;
use App\Type\DateTimeType;
use App\Enum\PlatoonTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PlatoonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxParticipants', NumberType::class, [
                'label' => 'form.platoon.maxParticipants',
                'attr' => [
                    'placeholder' => 'form.platoon.maxParticipants',
                    'title' => 'form.platoon.maxParticipants',
                    ],
                ])
            ->add('type', EnumType::class, array(
                'label' => 'form.platoon.type',
                'class' => PlatoonTypeEnum::class,
                'choice_label' => fn ($choice) => $choice->label(),
            ))
            ->add('startTime', DateTimeType::class, array(
                'label' => 'form.platoon.startTime',
                'widget' => 'single_text',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Platoon::class,
            'csrf_token_id' => 'platoon',
            'translation_domain' => 'platoon',
        ]);
    }
}
