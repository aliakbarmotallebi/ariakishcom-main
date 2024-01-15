<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResumeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'class' => 'w-1/2',
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('fatherName', TextType::class, [
                'label' => 'نام پدر',
                'attr'  => [
                    'class' => 'w-1/2',
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'شماره همراه',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'جنسیت',
                'choices' => ['آقا' =>  1, 'خانم' =>  0],
                'required' => true,
                'expanded' => true
            ])
            ->add('birthDate')
            ->add('maritalStatus', ChoiceType::class, [
                'label' => 'وضعیت تاهل',
                'choices' => ['متاهل' =>  1, 'مجرد' =>  0],
                'required' => true,
                'expanded' => true
            ])
            ->add('militaryStatus', ChoiceType::class, [
                'label' => 'وضعیت خدمت',
                'choices' => ['دارای پایان خدمت' =>  1, 'مشمول خدمت' =>  0],
                'expanded' => true
            ])
            ->add('nationalCode', TextType::class, [
                'label' => 'کد ملی',
                'attr'  => [
                    'class' => 'w-1/2',
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('birthCertificateNumber', TextType::class, [
                'label' => 'شماره شناسنامه',
                'attr'  => [
                    'class' => 'w-1/2',
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('address', TextareaType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('residentialStatus', ChoiceType::class, [
                'label' => 'وضعیت سکونت',
                'choices' => ['شخصی' =>  1, 'استیجاری' =>  0],
                'expanded' => true
            ])
            ->add('tel', TextType::class, [
                'label' => 'شماره همراه',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('degree', TextType::class, [
                'label' => 'شماره همراه',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('degreeDate')
            ->add('field', TextType::class, [
                'label' => 'شماره همراه',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('degreeSummary')
            ->add('language', ChoiceType::class, [
                'label' => 'میزان تسلط در زبان خارجی',
                'choices' => ['عالی' =>  1, 'متوسط' =>  0, 'ضعیف' =>  0],
                'expanded' => true
            ])
            ->add('guarantee', ChoiceType::class, [
                'label' => 'شغلی که به شما واگذر خواهد شد. نیاز به تضمین دارد مایل به رائه تضمین هستید',
                'choices' => ['بله' =>  1, 'خیر' =>  0],
                'expanded' => true
            ])
            ->add('jobTitle')
            ->add('salaryExpectation')
            ->add('startDateAvailability')
            ->add('iqScore', IntegerType::class, [
                'label' => 'ضریب هوشی',
            ])
            ->add('memoryScore', IntegerType::class, [
                'label' => 'حافظه',
            ])
            ->add('responsibilityScore', IntegerType::class, [
                'label' => 'مسئولیت پذیری',
            ])
            ->add('followUpScore', IntegerType::class, [
                'label' => 'پیگیری امور محوله',
            ])
            ->add('disciplinInWorkScore', IntegerType::class, [
                'label' => 'نظم و انضباط در کار',
            ])
            ->add('workEthicScore', IntegerType::class, [
                'label' => 'وجدان کاری',
            ])
            ->add('customerRespectScore', IntegerType::class, [
                'label' => 'احترام به  مشتری',
            ])
            ->add('motivationForWorking')
            ->add('insuranceNumber')
            ->add('employmentHistory')
            ->add('workExperience');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }
}