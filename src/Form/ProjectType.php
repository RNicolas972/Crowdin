<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Language;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',           TextType::class)
            ->add('description',    TextType::class)
            ->add('languages',      EntityType::class, [
                'class' => Language::class,
                'multiple' => true,
                'choice_label' => 'name',
            ])
            ->add('user',           EntityType::class, [
                'class' => User::class,
                'multiple' => false,
                'choice_label' => 'username',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
