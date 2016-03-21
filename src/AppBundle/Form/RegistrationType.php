<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
                'label' => 'Prénom',
                'attr' => array('class' => "test form-group")
            ))
            ->add('surname', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('address', TextType::class, array(
                'label' => 'Addresse'
            ))
            ->add('zip_code', TextType::class, array(
                'label' => 'Code Postal'
            ))
            ->add('city', TextType::class, array(
                'label' => 'Ville'
            ))
            ->add('phone', NumberType::class, array(
                'label' => 'Numéro de Téléphone',
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Adresse Email',
            ))
            ->add('username', null, array(
                'label' => 'Nom de Compte',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de Passe'),
                'second_options' => array('label' => 'Confirmation du Mot de Passe'),
                'invalid_message' => 'Les mots de passe sont différents.'
            ));
    }

    /*public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }*/

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'csrf_token_id'  => 'registration'
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}