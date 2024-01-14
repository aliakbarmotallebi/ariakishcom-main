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
                'label' => 'نام کامل',
                'attr'  => [
                    'placeholder' => 'نام خود را وارد کنید',
                ],
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'شماره تماس',
                'attr'  => [
                    'placeholder' => 'شماره همراه خود را وارد کنید',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'متن پیام شما',
                'attr'  => [
                    'placeholder' => 'متن خودتون رو برای ما ارسال کنید',
                ],
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