<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Domaine;
use App\Entity\Projet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('date_from',DateType::class,[
                'widget' => 'single_text',
                'html5' => true,
                    'attr' => ['class' => 'form-control'],])
            ->add('date_up',DateType::class,[
                'widget' => 'single_text',
                'html5' => true,
                    'attr' => ['class' => 'form-control'],])
            ->add('cout')
            ->add('domaine', EntityType::class, [
                'class' => Domaine::class,
                'choice_label' => 'nom_domaine',
                'multiple' => False,
                'expanded' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom_client',
                'multiple' => False,
                'expanded' => false,
                'attr' => ['class' => 'form-control'],
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
