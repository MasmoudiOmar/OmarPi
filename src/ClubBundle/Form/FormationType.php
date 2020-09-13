<?php

namespace ClubBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Titre')
            ->add('Description')
            ->add('DateDebut')
            ->add('DateFin')
            ->add('nbParticipant')
            ->add('idClub',EntityType::class,array('class'=>'ClubBundle:Club','choice_label'=>'Nom','multiple'=>false))
            ->add('Ajouter',SubmitType::class,['attr'=>['formnovalidate'=>'formnovalidate']]);;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClubBundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clubbundle_formation';
    }


}
