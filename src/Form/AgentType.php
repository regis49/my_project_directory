<?php

namespace App\Form;

use App\Entity\Agent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nomagent',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'min-length' => '2',
                        'max-length' => '50'
                    ],
                    'label' => 'Nom Agent',
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ],
                    'constraints' => [
                        new Assert\Length(['min' => 2, 'max' => 50]),
                        new Assert\NotBlank()
                    ]
                ]
            )
            ->add(
                'prenomagent',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'form-control',
                        'min-length' => '2',
                        'max-length' => '50'
                    ],
                    'label' => 'Prénom Agent',
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ],
                    'constraints' => [
                        new Assert\Length(['min' => 2, 'max' => 50]),
                        new Assert\NotBlank()
                    ]
                ]
            )
            ->add('datenais', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                
            ],
            'label' => 'Date de naissance',
            'label_attr' => [
                'class' => 'form-label mt-4'
            ],
                
            ])
            ->add('datepaysalary', TextType::class, [
            'attr' => [
                'class' => 'form-control',
               
            ],
            'label' => 'Date paye salaire',
            'label_attr' => [
                'class' => 'form-label mt-4'
            ],
                
               
            ])
            ->add('submit',SubmitType::class,
                [
                    'attr' => [
                        'class' => 'btn btn-primary mt-4'
                    ],
                    'label' => 'Ajouter un agent'
                ]
            );

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}
