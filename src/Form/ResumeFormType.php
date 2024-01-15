<?php

namespace App\Form;

use App\Entity\Resume;
use Symfony\Component\Form\AbstractType;
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
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('fatherName', TextType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('gender')
            ->add('birthDate')
            ->add('maritalStatus')
            ->add('militaryStatus')
            ->add('nationalCode', TextType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('birthCertificateNumber', TextType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('address', TextareaType::class, [
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('residentialStatus')
            ->add('tel')
            ->add('degree')
            ->add('degreeDate')
            ->add('field')
            ->add('degreeSummary')
            ->add('language')
            ->add('guarantee')
            ->add('jobTitle')
            ->add('salaryExpectation')
            ->add('startDateAvailability')
            ->add('iqScore')
            ->add('memoryScore')
            ->add('responsibilityScore')
            ->add('followUpScore')
            ->add('disciplinInWorkScore')
            ->add('workEthicScore')
            ->add('customerRespectScore')
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