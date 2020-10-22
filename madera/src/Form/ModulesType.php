<?php

namespace App\Form;

use App\Entity\Gammes;
use App\Entity\Huisserie;
use App\Entity\Modules;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_module', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('hauteur_module', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('longueur_module', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('plan_coupe', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('parametre_prix', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('cctp', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('is_modele', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('Remplissage', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('Sections', CollectionType::class, [
                'entry_type' => SectionsType::class,
                'entry_options' => [
                    'attr' => ['class' => 'libelle_section'],
                ],
            ])
            ->add('Montants', CollectionType::class, [
                'entry_type' => MontantsType::class,
                'entry_options' => [
                    'attr' => ['class' => 'libelle_montant'],
                ],
            ])
            ->add('Huisseries', EntityType::class, [
                'class' => Huisserie::class,
                'choice_label' => 'libelle_huisserie',
            ])
            ->add('Gammes', EntityType::class, [
                'class' => Gammes::class,
                'choice_label' => 'libelle_gamme',
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
