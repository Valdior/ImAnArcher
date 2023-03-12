<?php

namespace App\Form;

use App\Entity\Participant;
use App\Entity\User;
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
        $roles = $user->getRoles();

        if (in_array('ROLE_ADMIN', $roles)) {
            $builder->add('archer', EntityType::class, [
                'class' => User::class,
            ]);
        }

        $builder
            ->add('category')
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
            'user'  => User::class
        ]);
    }
}
