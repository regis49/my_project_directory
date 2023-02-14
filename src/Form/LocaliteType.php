<?php

namespace App\Form;

use App\Entity\Localite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LocaliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libloca',TextType::class,
            [
                'attr' => [
                    'class' => 'form-control',
                    'min-length' => '5',
                    'max-length' => '50'
                ],
                'label' => 'Libellé Localité',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 5, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ]
            )
            ->add(
                'submit',
                SubmitType::class,
                [
                    'attr' => [
                        'class' => 'btn btn-primary mt-4'
                    ],
                    'label' => 'Ajouter un agent'
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Localite::class,
        ]);
    }
}
