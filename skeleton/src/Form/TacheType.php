<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Etat;
use App\Entity\Priorite;
use App\Entity\Projet;
use App\Entity\Ressource;
use App\Entity\Tache;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            // ->add('date_from',DateType::class,[
            //     'widget' => 'single_text',
            //     'html5' => true,
            //     'attr' => ['class' => 'form-control']
            // ])
            // ->add('date_up',DateType::class,[
            //     'widget' => 'single_text',
            //     'html5' => true,
            //         'attr' => ['class' => 'form-control'],])
            // ->add('nombre_heure')
            // ->add('cout_horaire')
            // ->add('projet', EntityType::class, [
            //     'class' => Projet::class,
            //     'choice_label' => 'nom',
            //     'multiple' => False,
            //     'expanded' => false,
            //     'attr' => ['class' => 'form-control'],
            // ])
            // ->add('ressource', EntityType::class, [
            //     'class' => Ressource::class,
            //     'choice_label' => 'nom_ressource',
            //     'multiple' => False,
            //     'expanded' => false,
            //     'attr' => ['class' => 'form-control'],
            // ])
            // ->add('priorite', EntityType::class, [
            //     'class' => Priorite::class,
            //     'choice_label' => 'nom_priorite',
            //     'multiple' => False,
            //     'expanded' => false,
            //     'attr' => ['class' => 'form-control'],
            // ])
            ->add('etat', EntityType::class, [
                'class' => Etat::class,
                'choice_label' => 'nom',
                'multiple' => False,
                'expanded' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('equipe', EntityType::class, [
                'class' => Equipe::class,
                'choice_label' => 'nom',
                'multiple' => False,
                'expanded' => false,
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tache::class,
        ]);
    }
}
