<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Resume;
use App\Enum\Language;
use App\Enum\MotivationForWorking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class ResumeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class)
            ->add('fatherName', TextType::class)
            ->add('nationalCode', NumberType::class)
            ->add('birthCertificateNumber', NumberType::class,[
                'required'   => false,
            ])
            ->add('birthDate', TextType::class)
            ->add('phoneNumber', TextType::class, [
                'constraints' => [
                    new Regex('/^09[0-9]{9}$/')
                ]
            ])
            ->add('address', TextareaType::class)
            ->add('tel', TextType::class, [
                'required'   => false,
                'constraints' => [
                    new Regex("/\d+/")
                ]
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'جنسیت',
                'choices' => ['آقا' =>  1, 'خانم' =>  0],
                'required' => true,
                'expanded' => true
            ])
            ->add('maritalStatus', ChoiceType::class, [
             'label' => 'وضعیت تاهل',   
                'choices' => ['متاهل' =>  1, 'مجرد' =>  0],
                'required' => true,
                'expanded' => true
            ])
            ->add('militaryStatus', ChoiceType::class, [
                'choices' => ['دارای پایان خدمت' =>  1, 'مشمول خدمت' =>  0],
                'expanded' => true
            ])
            ->add('residentialStatus', ChoiceType::class, [
                'choices' => ['شخصی' =>  1, 'استیجاری' =>  0],
                'expanded' => true
            ])
            ->add('degree', TextType::class)
            ->add('degreeDate', TextType::class)
            ->add('field', TextType::class)
            ->add('degreeSummary', TextareaType::class,[
                'required'   => false,
            ])
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'عالی'  =>  Language::VeryGood,
                    'متوسط' =>  Language::Main,
                    'ضعیف' =>  Language::Poor,
                ],
                'multiple' => false,
                'expanded' => true
            ])
            ->add('guarantee', ChoiceType::class, [
                'choices' => ['بله' =>  1, 'خیر' =>  0],
                'expanded' => true
            ])
            ->add('jobTitle', TextType::class)
            ->add('salaryExpectation', TextType::class)
            ->add('startDateAvailability', TextType::class)
            ->add('iqScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('memoryScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('responsibilityScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('followUpScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('disciplinInWorkScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('workEthicScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('customerRespectScore', IntegerType::class, [
                'constraints' => [
                    new Type(type: 'integer'),
                    new Regex("/\d+/"),
                    new Range(min: 1, max: 100)
                ]
            ])
            ->add('motivationForWorking', ChoiceType::class, [
                'choices' => [
                    'ارتقا شغلی' =>  MotivationForWorking::Jobpromotion,
                    'استقلال مالی' =>  MotivationForWorking::FinancialinDependence
                ],
                'expanded' => true
            ])
            ->add('insuranceNumber', TextType::class)
            ->add('employmentHistory', TextareaType::class,[
                'required'   => false,
            ]);
            // ->add('workExperience', CollectionType::class, [
            //     'entry_type' => WorkExperienceCollectionType::class,
            //     'by_reference' => false,
            //     'allow_add' => true
            // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }

    
}