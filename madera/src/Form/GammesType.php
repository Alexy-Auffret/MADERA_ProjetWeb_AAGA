<?php

namespace App\Form;

use App\Entity\Gammes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GammesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_gamme')
            ->add('finition_exterieur')
            ->add('type_isolant')
            ->add('type_couverture')
            ->add('qualite_huisserie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gammes::class,
        ]);
    }
}
