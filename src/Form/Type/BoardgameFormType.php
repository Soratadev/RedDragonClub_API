<?php

namespace App\Form\Type;



use App\Entity\Boardgame;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoardgameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('designer', TextType::class)
            ->add('players', TextType::class)
            ->add('playingTime', TextType::class)
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'multiple' => true,
                'by_reference' => false,
                'choice_label' => 'category_id',
            ])
            ->add('complexity', NumberType::class, [
                'scale' => 2
            ])
            ->add('age', NumberType::class)
            ->add('cover', TextType::class)
            ->add('description', TextareaType::class);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boardgame::class,
            'csrf_protection' => false,
            'allow_extra_fields' => true
        ]);
    }
    public function getBlockPrefix(): string
    {
        return '';
    }
    public function getName(): string
    {
        return '';
    }
}