<?php

namespace IMIE\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocketType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',    'text')
            ->add('constructeur',   'entity', array(
                'class' => 'IMIECoreBundle:Constructeur',
                'property'    => 'nom',
                'multiple' => false
            ))
            ->add('valider',      'submit');
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMIE\CoreBundle\Entity\Socket'
        ));
    }
}
