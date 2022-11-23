<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\HttpFoundation\Request;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naiss')
            ->add('numRue')
            ->add('rue')
            ->add('ville')
            ->add('tel')
            ->add('mail')
            ->add('cours', EntityType::class, array('class' => 'App\Entity\Cours','choice_label' =>'libelle'))
            ->add('responsable', EntityType::class, array('class' => 'App\Entity\Responsable','choice_label' =>'nom'))
            ->add('ContratPret', EntityType::class, array('class' => 'App\Entity\ContratPret','choice_label' =>'id'))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel élève'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
