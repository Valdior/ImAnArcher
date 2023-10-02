<?php

namespace App\Form;

use App\Entity\Tournament;
use App\Enum\TournamentTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['required' => false])
            ->add('startDate', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('endDate', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('type', EnumType::class, array(
                'class' => TournamentTypeEnum::class,
            ))
            ->add('organizer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
            'csrf_token_id' => 'tournament',
            'translation_domain' => 'tournament',
            // 'error_mapping' => [
            //     'matchingCityAndZipCode' => 'city',
            // ],
        ]);
    }
}
