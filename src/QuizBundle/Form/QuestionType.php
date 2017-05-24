<?php

namespace QuizBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name_question');

        for($y = 1; $y <= 4; $y++)
        {
            $builder->add('name_reponse'.$y, TextType::class, ['mapped' => false]);

            $builder->add('resultat'.$y, ChoiceType::class ,array(
                'mapped' => false,
                'choices' => array(
                    'Vrai ou Faux' => array(
                        'Vrai' => 'Vrai',
                        'Faux' => 'Faux',
                    ))));
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
