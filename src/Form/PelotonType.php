<?php

namespace App\Form;

use App\Entity\Peloton;
use App\Enum\PelotonTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PelotonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxParticipants')
            ->add('type', EnumType::class, array(
                'class' => PelotonTypeEnum::class,
                'choice_label' => fn ($choice) => $choice->label()
            ))
            ->add('startTime')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Peloton::class,
            'csrf_token_id' => 'peloton',
            'translation_domain' => 'peloton',
        ]);
    }
}
