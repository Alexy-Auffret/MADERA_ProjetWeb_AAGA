<?php

namespace App\Form;

use App\Entity\Gammes;
use App\Entity\Huisserie;
use App\Entity\Modules;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Gammes', EntityType::class, [
                'class' => Gammes::class,
                'choice_label' => 'libelle_gamme',
                'placeholder' => 'Choisir une gamme',
                'label' => false,
                'attr' => [
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('libelle_module', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Libellé du module",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('hauteur_module', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Hauteur du module",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('longueur_module', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Longueur du module",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('plan_coupe', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Type de plan de coupe (ex:A:A)",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('parametre_prix', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "% à appliquer au prix de base",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('cctp', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "CCTP (type de dalle ou plots)",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('is_modele', CheckboxType::class, [
                'label' => "Est un Modèle : ",
                'required' => false,

                'attr' => [
                    'class' => 'ml-2 mt-4 ',
                ]
            ])
            ->add('remplissage', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Type de remplissage",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('sections', CollectionType::class, [
                'entry_type' => SectionsType::class,
                'entry_options' => [
                    'attr' => ['class' => 'libelle_section'],
                ],
            ])
            ->add('montants', CollectionType::class, [
                'entry_type' => MontantsType::class,
                'entry_options' => [
                    'attr' => ['class' => 'libelle_montant'],
                    'label' => 'Gamme'
                ],
            ])
            ->add('huisseries', CollectionType::class, [
                'entry_type' =>HuisserieType::class,
                'entry_options' => [
                    'attr' => ['class' => 'libelle_huisserie'],
                    'label' => 'Huisserie'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Modules::class,
        ]);
    }
}
