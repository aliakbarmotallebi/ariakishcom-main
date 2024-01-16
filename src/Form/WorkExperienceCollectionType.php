<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkExperienceCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('insuranceNumber', TextType::class,[
            'label' => 'چنانچه سابقه بیمه تامین اجتماعی دارید شماره بیمه خود را بنویسید',
            'attr'  => [
                'placeholder' => '123456789123456',
            ],
        ])
        ->add('employmentHistory', TextareaType::class,[
            'label' => 'سوابق شغلی و تخصصی و تجربه های کاری و سمت های که داشتید را عنوان نمایید',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    public function getBlockPrefix()
    {
        return 'wealthbot_riabundle_ria_subclass_type';
    }
}