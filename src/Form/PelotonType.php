<?php

namespace App\Form;

use App\Entity\Platoon;
use App\Enum\PlatoonTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatoonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxParticipants')
            ->add('type', EnumType::class, array(
                'class' => PlatoonTypeEnum::class,
                'choice_label' => fn ($choice) => $choice->label()
            ))
            ->add('startTime')
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
