<?php

namespace App\Form;

use App\Entity\Club;
use App\Type\DateType;
use App\Form\PlatoonType;
use App\Entity\Tournament;
use App\Enum\TournamentTypeEnum;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'form.tournament.name'
                ])
            ->add('startDate', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'form.tournament.startDate',
            ))
            ->add('endDate', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'form.tournament.endDate',
            ))
            ->add('type', EnumType::class, array(
                'class' => TournamentTypeEnum::class,
                'label' => 'form.tournament.type',
            ))
            ->add('organizer', EntityType::class, array(
                'label' => 'form.tournament.organizer',
                'class' => Club::class
            ))
            ->add('platoons', CollectionType::class, array(
                'entry_type' => PlatoonType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
            'csrf_protection' => true,
            'csrf_token_id' => 'tournament',
            'csrf_field_name' => '_token',
            'translation_domain' => 'tournament',
            // 'error_mapping' => [
            //     'matchingCityAndZipCode' => 'city',
            // ],
        ]);
    }
}
