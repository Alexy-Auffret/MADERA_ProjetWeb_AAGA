<?php

namespace App\Form;

use App\Entity\Composants;
use App\Entity\Fournisseurs;
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
            ->add('libelle_composant')
            ->add('caracteristique')
            ->add('unite_usage')
            ->add('prix_base')
            ->add('fournisseur', EntityType::Class, array(
                'class'=> Fournisseurs::class,
                'choice_label' =>'raison_sociale'
            ))
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
