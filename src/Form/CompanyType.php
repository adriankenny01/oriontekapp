<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array (
                'attr' =>  array('class' => 'form-control rounded-0', 'required' => 'required')
            ))
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
                'attr' =>  array('class' => 'form-control rounded-0', 'required' => 'required')
            ))
            ->add('owner', TextType::class , array (
                'attr' => array('class' => 'form-control rounded-0', 'required' => 'required')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
