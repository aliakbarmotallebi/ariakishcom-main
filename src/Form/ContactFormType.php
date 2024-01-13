<?php

namespace App\Form;

use App\Entity\Contact;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'row_attr' => ['class' => 'flex flex-col mb-6 last:mb-0'],
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                    'class' => 'bg-gray-300 sm:h-12 h-10 text-sm text-dark-550 focus:font-bold placeholder:text-gray-500 bg-opacity-10 rounded-md border  border-gray-200 px-4'
                ],
                'label_attr' => [
                    'class' =>  'text-gray-500 mr-4 text-sm mb-1'
                ]
            ])
            ->add('phoneNumber', TextType::class, [
                'row_attr' => ['class' => 'flex flex-col mb-6 last:mb-0'],
                'label' => 'شماره تماس',
                'attr'  => [
                    'placeholder' => 'شماره همراه خود را وارد کنید',
                    'class' => 'bg-gray-300 sm:h-12 h-10 text-sm text-dark-550 focus:font-bold   placeholder:text-gray-500 bg-opacity-10 rounded-md border  border-gray-200 px-4'
                ],
                'label_attr' => [
                    'class' =>  'text-gray-500 mr-4 text-sm mb-1'
                ]
            ])
            ->add('message', TextareaType::class, [
                'row_attr' => ['class' => 'flex flex-col mb-6'],
                'label' => 'متن پیام شما',
                'attr'  => [
                    'placeholder' => 'متن خودتون رو برای ما ارسال کنید',
                    'class' => 'placeholder:pt-1 pt-1 bg-gray-300 h-28 -28 max-h-28 text-sm text-dark-550 focus:font-bold placeholder:text-gray-500 bg-opacity-10 rounded-md border border-gray-200 px-4'
                ],
                'label_attr' => [
                    'class' =>  'text-gray-500 mr-4 text-sm mb-1'
                ]
                ]);
            // ->add('captcha', CaptchaType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}