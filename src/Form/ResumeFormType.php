<?php

namespace App\Form;

use App\Entity\Admin;
use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
                    'placeholder' => 'علیرضا امیری',
                ],
            ])
            ->add('fatherName', TextType::class, [
                'label' => 'نام پدر',
                'attr'  => [
                    'placeholder' => 'محمد',
                ],
            ])
            ->add('nationalCode', TextType::class, [
                'label' => 'کد ملی',
                'attr'  => [
                    'placeholder' => '0021232147',
                ],
            ])
            ->add('birthCertificateNumber', TextType::class, [
                'label' => 'شماره شناسنامه',
                'attr'  => [
                    'placeholder' => '6025',
                ],
            ])
            ->add('birthDate', TextType::class, [
                'label' => 'تاریخ تولد',
                'attr'  => [
                    'placeholder' => '6025',
                ],
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'شماره همراه',
                'attr'  => [
                    'placeholder' => '0912001452',
                ],
            ])
            ->add('address', TextareaType::class, [
                'label' => ' آدرس محل سکونت',
                'attr'  => [
                    'placeholder' => 'تهران، خیابان ولیعصر',
                ],
            ])
            ->add('tel', TextType::class, [
                'label' => 'تلفن ثابت',
                'attr'  => [
                    'placeholder' => '02128621420',
                ],
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
                'label' => 'وضعیت خدمت',
                'choices' => ['دارای پایان خدمت' =>  1, 'مشمول خدمت' =>  0],
                'expanded' => true
            ])
            ->add('residentialStatus', ChoiceType::class, [
                'label' => 'وضعیت سکونت',
                'choices' => ['شخصی' =>  1, 'استیجاری' =>  0],
                'expanded' => true
            ])
            ->add('degree', TextType::class, [
                'label' => 'مقطع تحصیلی',
                'attr'  => [
                    'placeholder' => 'کارشناسی',
                ],
            ])
            ->add('degreeDate', TextType::class, [
                'label' => 'تاریخ آخرین مدرک تحصیلی',
                'attr'  => [
                    'placeholder' => '1380/06/30',
                ],
            ])
            ->add('field', TextType::class, [
                'label' => 'رشته تحصیلی',
                'attr'  => [
                    'placeholder' => 'مدیریت بارزگانی',
                ],
            ])
            ->add('degreeSummary', TextareaType::class, [
                'label' => 'دوره های آموزشی دیگر که گذرانده اید',
            ])
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
            ->add('jobTitle', TextType::class,[
                'label' => 'عنوان  شغل درخواستی',
                'attr'  => [
                    'placeholder' => 'منشی دفتر',
                ],
            ])
            ->add('salaryExpectation', TextType::class,[
                'label' => 'میزان حقوق درخواستی(تومان)',
                'attr'  => [
                    'placeholder' => '10000000',
                ],
            ])
            ->add('startDateAvailability', TextType::class,[
                'label' => 'تاریخ آمادگی شروع به کار',
                'attr'  => [
                    'placeholder' => '1402/10/12',
                ],
            ])
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
            ->add('motivationForWorking', ChoiceType::class, [
                'label' => 'انگیزه شما از کار کردن چیست؟',
                'choices' => ['ارتقا شغلی' =>  1, 'استقلال مالی' =>  0],
                'expanded' => true
            ])
            ->add('insuranceNumber', TextType::class,[
                'label' => 'چنانچه سابقه بیمه تامین اجتماعی دارید شماره بیمه خود را بنویسید',
                'attr'  => [
                    'placeholder' => '123456789123456',
                ],
            ])
            ->add('employmentHistory', TextareaType::class,[
                'label' => 'سوابق شغلی و تخصصی و تجربه های کاری و سمت های که داشتید را عنوان نمایید',
            ])
            ->add('workExperience', CollectionType::class, [
                'label' => 'تاریخچه سابقه کاری شما',
                'entry_type' => WorkExperienceCollectionType::class,
                'by_reference' => false,
                'allow_add' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resume::class,
        ]);
    }

    
}