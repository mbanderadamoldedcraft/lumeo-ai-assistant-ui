<?php

namespace App\Form;

use App\Entity\UserEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Username',
                'attr' => ['class' => 'form-input']
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'attr' => ['class' => 'form-input'],
                'required' => false, // optional on edit
                'mapped' => false,
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'attr' => ['class' => 'form-input']
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'attr' => ['class' => 'form-input']
            ])
            ->add('fullName', TextType::class, [
                'label' => 'Full Name',
                'required' => false,
                'attr' => ['class' => 'form-input']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
                'attr' => ['class' => 'form-input']
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Roles',
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
                'attr' => ['class' => 'checkbox-group']
            ])
            // Boolean flags mapped as CheckboxType
            ->add('isActive', CheckboxType::class, [
                'label' => 'Active Status',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllCompany', CheckboxType::class, [
                'label' => 'Access All Companies',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllBranch', CheckboxType::class, [
                'label' => 'Access All Branches',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllBU', CheckboxType::class, [
                'label' => 'Access All BUs',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllDivision', CheckboxType::class, [
                'label' => 'Access All Divisions',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllDept', CheckboxType::class, [
                'label' => 'Access All Departments',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllDeptUnit', CheckboxType::class, [
                'label' => 'Access All Department Units',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isAccessAllEmpType', CheckboxType::class, [
                'label' => 'Access All Employee Types',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
            ->add('isDeleted', CheckboxType::class, [
                'label' => 'Is Deleted',
                'required' => false,
                'attr' => ['class' => 'form-checkbox']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserEntity::class,
        ]);
    }
}
