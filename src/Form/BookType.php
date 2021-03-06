<?php

namespace App\Form;

use app\Entity\Library;
use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('author', null, [
                'label' => 'Auteur'
            ])
            ->add('datePublication', DateType::class, [
                'label' => 'Date de publication',
                'format' => 'dd-MM-yyyy'
            ])
            ->add('resume', null, [
                'label' => 'Résumé'
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Disponible',
                'choices' => [
                    'Disponible' => true,
                    'Prêté' => false
                ]
            ])
            ->add('borrower', null, [
                'label' => 'Nom emprunteur'
            ])
            ->add('category', null, [
                'label' => 'Catégorie'
            ])
            // ->add('cityLibrary', null, [
            //   'label' => 'Lieu'
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
