<?php

namespace App\Form;

use App\Entity\Gammes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GammesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_gamme', TextType::class, [
                'attr' => [
                    'placeholder' => "Libellé de la gamme",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('finition_exterieur', TextType::class, [
                'attr' => [
                    'placeholder' => "Finitions extèrieure",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('type_isolant', TextType::class, [
                'attr' => [
                    'placeholder' => "Type d'isolant",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('type_couverture', TextType::class, [
                'attr' => [
                    'placeholder' => "Type de couverture",
                    'class' => 'form-control mt-2',
                ]
            ])
            ->add('qualite_huisserie', TextType::class, [
                'attr' => [
                    'placeholder' => "Qualité des huisseries",
                    'class' => 'form-control mt-2',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gammes::class,
        ]);
    }
}
