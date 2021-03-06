<?php

namespace App\Form;


use App\Entity\Calculator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @DI\Service(autowire = true)
 * @DI\FormType
 */
class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number1', NumberType::class)
            ->add('operation', ChoiceType::class, [
                'choices' => [
                    'Plus' => 'Plus',
                    'Minus' => 'Minus',
                    'Multiply' => 'Multiply',
                    'Divide' => 'Divide'
                ]
            ])
            ->add('number2', NumberType::class)
            ->add('calculate', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calculator::class
        ]);
    }
}
