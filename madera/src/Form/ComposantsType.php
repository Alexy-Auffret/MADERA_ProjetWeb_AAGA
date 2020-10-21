<?php

namespace App\Form;

use App\Entity\Composants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComposantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_composant')
            ->add('caracteristique')
            ->add('unite_usage')
            ->add('prix_base')
            ->add('fournisseur')
            ->add('famille')
            ->add('Sections')
            ->add('montants')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composants::class,
        ]);
    }
}
