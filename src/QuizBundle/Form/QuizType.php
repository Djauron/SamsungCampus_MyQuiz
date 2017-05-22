<?php

namespace QuizBundle\Form;

use QuizBundle\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class QuizType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $count = 1;
        if($options['block_name'] == 'create_quiz')
        {
            $builder
                ->add('name_quiz')
                ->add('id_categorie', EntityType::class, array(
                    'class' => 'QuizBundle:Categorie',
                    'choice_label' => 'name_categorie'));
        }

        if($options['block_name'] == 'create_quiz_two')
        {
            $builder
                ->add('id_theme', EntityType::class, array(
                     'class' => 'QuizBundle:Theme',
                     'choice_label' => 'name_theme'));

            for($i = 0; $i <= 20; $i++)
            {
                $builder->add('name_question'.$i, TextType::class, ['mapped' => false]);
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
            'data_class' => 'QuizBundle\Entity\Quiz'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quizbundle_quiz';
    }


}
