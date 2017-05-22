<?php

namespace QuizBundle\Form;

use function Sodium\add;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CategorieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if($options['block_name'] == 'edit_categorie' || $options['block_name'] == 'delete_categorie')
        {
            $builder
                ->add('id', EntityType::class, array(
                    'class' => 'QuizBundle:Categorie',
                    'choice_label' => 'namecategorie'));
        }

        if($options['block_name'] != 'delete_categorie')
        {
            $builder
                ->add('name_categorie');
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
            'data_class' => 'QuizBundle\Entity\Categorie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_categorie';
    }


}
