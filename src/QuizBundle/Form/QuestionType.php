<?php

namespace QuizBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $count = 1;
        $builder
            ->add('name_question');

        for($y = 1; $y <= 4; $y++)
        {
            $builder->add('name_reponse'.$count, TextType::class, ['mapped' => false]);

            $builder->add('resultat'.$count, ChoiceType::class ,array(
                'mapped' => false,
                'choices' => array(
                    'Vrai ou Faux' => array(
                        'Vrai' => 'Vrai',
                        'Faux' => 'Faux',
                    ))));
            $count++;
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuizBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_question';
    }


}
