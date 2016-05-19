<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FuncionarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('cpf', TextType::class, array('label' => 'CPF','attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('dataNascimento', DateType::class, array('label' => 'Data de Nascimento', 'years' =>range(date('Y') -85, date('Y') -14), 'attr'=>array('class'=>'formcontrol','style'=>'margin-bottom:15px') ))
            ->add('endereco', TextType::class, array('label' => 'Endereço','attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Funcionario'
        ));
    }
}
