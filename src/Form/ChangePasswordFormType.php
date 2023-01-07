<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_options' => [
                    'constraints' => [
                        new NotBlank([
                            'message' => 'form.user.password_required',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'form.user.password_min_value',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'label' => 'form.user.new_password',
                    'attr' => [
                        'placeholder' => 'form.user.new_password',
                        'title' => 'form.user.password',
                        'class' => 'sr-only'
                    ],
                ],
                'second_options' => [
                    'label' => 'form.user.password_confirmation',
                    'attr' => [
                        'placeholder' => 'form.user.password_confirmation',
                        'title' => 'form.user.password_confirmation',
                        'class' => 'sr-only'
                    ],
                ],
                'invalid_message' => 'form.user.mismatch',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'translation_domain' => 'user'
        ]);
    }
}
