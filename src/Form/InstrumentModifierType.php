<?php

namespace App\Form;

use App\Entity\Instrument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpFoundation\Request;

class InstrumentModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom')
        ->add('numero_serie')
        ->add('dateAchat')
        ->add('prixAchat')
        ->add('utilisation')
        ->add('cheminImage')
        ->add('marque', EntityType::class, array('class' => 'App\Entity\Marque','choice_label' =>'libelle'))
        ->add('couleur', EntityType::class, array('class' => 'App\Entity\Couleur','choice_label' =>'nom', 'multiple' => true))
        //->add('typeInstrument', EntityType::class, array('class' => 'App\Entity\TypeInstrument','choice_label' =>'id', 'multiple' => true))
        //->add('marque')
        //->add('couleur')
        //->add('typeInstruments')
        ->add('enregistrer', SubmitType::class, array('label' => 'Modifier instrument'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
