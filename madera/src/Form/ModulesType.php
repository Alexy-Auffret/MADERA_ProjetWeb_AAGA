<?php

namespace App\Form;

use App\Entity\Modules;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_module')
            ->add('hauteur_module')
            ->add('longueur_module')
            ->add('plan_coupe')
            ->add('parametre_prix')
            ->add('cctp')
            ->add('is_modele')
            ->add('Remplissage')
            ->add('Sections')
            ->add('Montants')
            ->add('Huisseries')
            ->add('Gammes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Modules::class,
        ]);
    }
}
