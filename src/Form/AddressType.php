<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address' ,  TextType::class, array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('city' , TextType::class, array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('zip_code' , IntegerType::class, array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('phone_number' , TextType::class, array (
                "attr"=>array('class' => 'form-control rounded-0'),
            ))
            ->add('client_id' , HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
