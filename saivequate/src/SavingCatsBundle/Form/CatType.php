<?php

namespace SavingCatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maidenName')
            ->add('colours')
            ->add('race')
            ->add('photo')
            ->add('waistSize')
            ->add('earSize')
            ->add('weight')
            ->add('favouriteColour')
            ->add('quality1')
            ->add('quality1')
            ->add('weakness')
            ->add('favouriteBrand')
            ->add('availability')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        
        //todo!!!!
        $resolver->setDefaults(array(
            'data_class' => 'SavingCatsBundle\Entity\Cat'
        ));
    }
}
