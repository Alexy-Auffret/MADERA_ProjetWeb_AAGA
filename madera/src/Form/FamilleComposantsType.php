<?php

namespace App\Form;

use App\Entity\FamilleComposants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilleComposantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_famille_composants', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Libellé",
                    'class' => 'form-control mt-2',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FamilleComposants::class,
        ]);
    }
}
