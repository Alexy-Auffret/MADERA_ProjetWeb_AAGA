<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Fournisseurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
                    'class' => 'form-control'
                ]
            ])
            ->add('num_tel', TextType::Class, [
                'attr' => [
                    'placeholder' => "Numéro de téléphone",
                    'class' => 'form-control'
                ]
            ])
            ->add('contact_nom_complet', TextType::Class,[
                'attr' => [
                    'placeholder' => "Nom complet du contact",
                    'class' => 'form-control'
                ]
            ])
            ->add('mail', TextType::Class,[
                'attr' => [
                    'placeholder' => "Adresse mail",
                    'class' => 'form-control'
                ]
            ])
            ->add('adresse', EntityType::Class, array(
                'class' => Adresses::class,
                'choice_label' => 'rue',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseurs::class,
        ]);
    }
}