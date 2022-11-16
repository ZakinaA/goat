<?php

namespace App\Form;

use App\Entity\Instrument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstrumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('date achat', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                 ])
            ->add('Prix achat', TextType::class) 
            ->add('Marque', TextType::class)
            ->add('Modèle', TextType::class)
            ->add('Numéro de série', TextType::class)
            ->add('Couleur', TextType::class)
            ->add('Utilisation', TextType::class)
            ->add('maison', EntityType::class, array('class' => 'App\Entity\Maison','choice_label' => 'nom' ))
            //->add('promotion')
	    ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel étudiant'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
