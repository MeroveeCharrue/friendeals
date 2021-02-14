<?php

namespace Friendeals\Form\Expense;

use Friendeals\Entity\Expense;
use Friendeals\Entity\Player;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpenseCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paymentDate', DateType::class, [
                'widget' => 'single_text',
                'label' => ' '
            ])
            ->add('paymentType', ChoiceType::class, [
                'choices' => [
                    'groceries' => 'groceries',
                    'eating out' => 'eating out',
                    'supply' => 'supply',
                    'car' => 'car',
                    'holidays' => 'holidays',
                    'extra' => 'extra'
                ],
                'label' => ' '
            ])
            ->add('label', TextType::class)
            ->add('amount', MoneyType::class, [
                'currency' => false,
                'divisor' => 100,
                'label' => '€'
            ])
            ->add('author', EntityType::class, [
                'class' => Player::class,
                'choice_label' => 'name',
                'expanded' => true,
                'label' => ' '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Expense::class,
        ]);
    }
}
