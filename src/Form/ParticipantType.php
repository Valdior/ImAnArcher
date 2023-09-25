<?php

namespace App\Form;

use App\Entity\ArcherCategory;
use App\Entity\Participant;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];

        $builder
            ->add('archer', EntityType::class, array(
                'placeholder' => 'Choissisez l\'archer',
                'class' => User::class,
                'disabled' => $options['disabled_archer'],
                'data' => $user,
                'attr' => ['data-select' => 'true'],
                'required' => true
            ))
            ->add('category', EntityType::class, [
                'class'  => ArcherCategory::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.minimumAge', 'ASC');
                },
                'group_by' => function ($choice, $key, $value) {
                    if (strpos($choice, 'W') !== false) {
                        return 'Woman';
                    } else {
                        return 'Men';
                    }
                },
            ])
        ;

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();

                if (!empty($data->getId())) {
                    $form
                        ->add('numberOfX')
                        ->add('numberOfTen')
                        ->add('numberOfNine')
                        ->add('points')
                        ->add('isForfeited')
                        ->add('archer', null, array(
                            'disabled' => true,
                        ))
                    ;
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'participant_item',
            'user'  => User::class,
            'disabled_archer'  => true,
            'is_already_registered' => false,
        ]);

        $resolver->setAllowedTypes('disabled_archer', 'bool');
        $resolver->setAllowedTypes('is_already_registered', 'bool');
    }
}
