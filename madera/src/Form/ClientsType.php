<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_client', TextType::class, [
                'attr' => [
                    'placeholder' => "Nom",
                    'class' => 'form-control',
                ]
            ])
            ->add('prenom_client', TextType::class, [
        'attr' => [
            'placeholder' => "Prenom",
            'class' => 'form-control',
        ]
    ])
            ->add('num_tel_client', TextType::class, [
                'attr' => [
                    'placeholder' => "Numéro de téléphone",
                    'class' => 'form-control',
                ]
            ])
            ->add('mail_client', TextType::class, [
                'attr' => [
                    'placeholder' => "Adresse mail",
                    'class' => 'form-control',
                ]
            ])
            ->add('rue', TextType::class, [
                'attr' => [
                    'placeholder' => "Rue",
                    'class' => 'form-control',
                ]
            ])
            ->add('cp', TextType::class, [
                'attr' => [
                    'placeholder' => "Code postale",
                    'class' => 'form-control',
                ]
            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'placeholder' => "Ville",
                    'class' => 'form-control',
                ]
            ])
            ->add('pays', TextType::class, [
                'attr' => [
                    'placeholder' => "Pays",
                    'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
