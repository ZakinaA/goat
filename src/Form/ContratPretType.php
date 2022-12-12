<?php

namespace App\Form;

use App\Entity\ContratPret;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ContratPretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDebut')
            ->add('dateFin')
            ->add('attestationAssurance')
            ->add('etatDetailleDebut')
            ->add('etatDetailleFin')
            ->add('instrument', EntityType::class, array('class' => 'App\Entity\Instrument','choice_label' =>'nom'))
            ->add('eleve', EntityType::class, array('class' => 'App\Entity\User','choice_label' =>'nom'))
            ->add('eleve', EntityType::class, array('class' => 'App\Entity\User','choice_label' =>'prenom'))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouveau ContratPret'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContratPret::class,
        ]);
    }
}
