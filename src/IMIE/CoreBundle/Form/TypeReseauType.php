<?php

namespace IMIE\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeReseauType extends AbstractType
{


    public function __construct($options = null) {
        $this->options = $options;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', 
                array('choices' => $this->options['type'] ))

            ->add('nom',    'text')

            ->add('vitesse', 'number',
                array('required' => $this->options['vitesse_required']) )

            ->add('port', 'number',
                array('required' => $this->options['port_required']) )

/*            ->add('ram', 'number',
                array('required' => $this->options['ram_required']) )

            ->add('disque', 'number',
                array('required' => $this->options['disque_required']) )

            ->add('processeur',   'entity',
                array('class' => 'IMIECoreBundle:Processeur',
                'property'    => 'nom',
                'multiple' => false),
                array('required' => $this->options['processeur_required']) )

            ->add('cm',   'entity',
                array('class' => 'IMIECoreBundle:Cm',
                'property'    => 'nom',
                'multiple' => false),
                array('required' => $this->options['cm_required']) )*/


            ->add('constructeur',   'entity',
             array(
                'class' => 'IMIECoreBundle:Constructeur',
                'property'    => 'nom',
                'multiple' => false
            ))
            ->add('valider',      'submit')    
        ;
    }

    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMIE\CoreBundle\Entity\TypeMateriel'
        ));
    }
}
