<?php

namespace App\Form;

use App\Entity\Clients;
use App\Entity\Company;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('full_name', TextType::class, array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('date_of_birth' , DateType::class , array(
                'widget' => 'single_text',
                'attr' =>  array('class' => 'form-control rounded-0', 'required' => 'required')
            ))

            ->add('owner', TextType::class , array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
                'attr' =>  array('class' => 'form-control rounded-0', 'required' => 'required')
            ))
            // ->add('company_id')

            ->add('company', EntityType::class, [
                'label' => 'Company',
                'class' => Company::class,
                'required' => 'required',
                "attr"=>array('class' => 'form-control rounded-0'),
                'choice_label' => function ($company) {
                    return $company->getName();
                },
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
