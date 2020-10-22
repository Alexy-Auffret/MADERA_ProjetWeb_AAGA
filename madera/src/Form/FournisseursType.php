<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Fournisseurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raison_sociale', TextType::Class,[
                'attr' => [
                    'placeholder' => "Raison Sociale",
                    'class' => 'form-control mt-2',
                    'width' => '10%'
                ]
            ])
            ->add('num_tel', NumberType::Class, [
                'attr' => [
                    'placeholder' => "Numéro de téléphone",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('contact_nom_complet', TextType::Class,[
                'attr' => [
                    'placeholder' => "Nom complet du contact",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('mail', TextType::Class,[
                'attr' => [
                    'placeholder' => "Adresse mail",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('rue', TextType::Class,[
                'attr' => [
                    'placeholder' => "Rue",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('cp', TextType::Class,[
                'attr' => [
                    'placeholder' => "Code Postale",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('ville', TextType::Class,[
                'attr' => [
                    'placeholder' => "Ville",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('pays', TextType::Class,[
                'attr' => [
                    'placeholder' => "Pays",
                    'class' => 'form-control mt-2'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseurs::class,
        ]);
    }
}
