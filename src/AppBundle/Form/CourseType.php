<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name','text', array('required' => true))
        ->add('description','text', array('required' => true))
        ->add('date','text', array('required' => true))
        ->add('diploma','text', array('required' => true))
        ->add('location','text', array('required' => true))
        ->add('save','submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Course'
            ));
    }

    public function getName()
    {
        return 'appbundle_course';
    }
}
