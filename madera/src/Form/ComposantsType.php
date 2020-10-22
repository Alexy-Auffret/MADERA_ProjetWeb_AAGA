<?php

namespace App\Form;

use App\Entity\Composants;
use App\Entity\FamilleComposants;
use App\Entity\Fournisseurs;
use App\Entity\Sections;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ComposantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_composant',TextType::class,[

                'attr'=>[
                    'placeholder'=>"Libellé",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('caracteristique',TextType::class,[

                'attr'=>[
                    'placeholder'=>"Caractéristique",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('unite_usage',TextType::class,[

                'attr'=>[
                    'placeholder'=>"Unité d'usage",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('prix_base',NumberType::class,[

                'attr'=>[
                    'placeholder'=>"Prix de base",
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('fournisseur', EntityType::Class, array(
                'class'=> Fournisseurs::class,
                'choice_label' =>'raison_sociale',
                'attr'=>[
                    'placeholder'=>"Raison Sociale",
                    'class' => 'form-control mt-2'
                ]
            ))
            ->add('famille',EntityType::Class, array(
                'class'=>FamilleComposants::class,
                'choice_label' => 'libelle_famille_composants',
                'attr'=>[
                    'placeholder'=>"Famille",
                    'class' => 'form-control mt-2'
                ]
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composants::class,
        ]);
    }
}
