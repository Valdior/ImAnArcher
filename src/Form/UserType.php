<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('lastname', TextType::class, ['required' => true, 'label' => 'form.profil.lastname'])
            ->add('firstname', TextType::class, ['required' => true, 'label' => 'form.profil.firstname'])
            ->add('birthdate', BirthdayType::class, ['required' => false,
                                                    'label' => 'form.profil.birthdate', 'widget' => 'single_text'])
            ->add('gender', ChoiceType::class, array(
                'required' => false,
                'label' => 'form.profil.gender',
                'placeholder' => 'form.profil.gender',
                'choices'  => User::getGenderList(),
                'choice_label' => function ($value, $key, $index) {
                    return $value;
                },
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_token_id' => 'profil',
            'translation_domain' => 'user'
        ]);
    }
}
