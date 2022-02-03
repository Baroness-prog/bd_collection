<?php

namespace App\Form;

use App\Entity\BdColec;
use App\Entity\Genres;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class AddBdCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('edition')
            ->add('Tome')
            ->add('image')
            ->add('genres',EntityType::class,[
                'choice_name' => 'name',
                'class' => Genres::class
            ])
            ->add('add_at',HiddenType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BdColec::class,
        ]);
    }
}
