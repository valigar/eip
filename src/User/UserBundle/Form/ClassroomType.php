<?php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClassroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('classname')
            ->add('description')
            //->add('professorUserId')
            //->add('createdAt')
            //->add('updatedAt')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\Classroom'
        ));
    }

    public function getName()
    {
        return 'user_userbundle_classroomtype';
    }
}
