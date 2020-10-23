<?php

namespace App\Form;

use App\Entity\Fournisseurs;
use App\Entity\Montants;
use App\Entity\Composants;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ComposantsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MontantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle_montant',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Libellé',
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('composants',CollectionType::class,[
                'entry_type'=>ComposantsType::class,

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Montants::class,
        ]);
    }
}
