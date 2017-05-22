<?php

namespace QuizBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ThemeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if($options['block_name'] == 'create_theme')
        {
            $builder
                ->add('id_categorie', EntityType::class, array(
                    'class' => 'QuizBundle:Categorie',
                    'choice_label' => 'namecategorie'));
        }

        if($options['block_name'] == 'edit_theme' || $options['block_name'] == 'delete_theme')
        {
            $builder
                ->add('id', EntityType::class, array(
                    'class' => 'QuizBundle:Theme',
                    'choice_label' => 'nametheme'));
        }


        if($options['block_name'] != 'delete_theme')
        {
            $builder
                ->add('name_theme');
        }

        $builder
            ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuizBundle\Entity\Theme'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_theme';
    }


}
