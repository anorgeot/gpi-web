<?php

namespace IMIE\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielType extends AbstractType
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
        $cat=$this->options['cat'];
        $builder
            ->add('numero', 'text',
                array('required' => false))
            ->add('typeMateriel',   'entity',
             array(
                'class' => 'IMIECoreBundle:TypeMateriel',
                'property'    => 'nom',
                'multiple' => false,
                'query_builder' => function($repo) use($cat)
                    {
                    return $repo->getByCatQueryBuilder($cat);
                    },
                'required' => true
            ))
            ->add('salle',   'entity',
             array(
                'class' => 'IMIECoreBundle:Salle',
                'property'    => 'nom',
                'multiple' => false
            ))
            ->add('valider', 'submit');
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IMIE\CoreBundle\Entity\Materiel'
        ));
    }
}
