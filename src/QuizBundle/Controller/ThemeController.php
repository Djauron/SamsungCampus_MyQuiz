<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Theme;
use QuizBundle\Form\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ThemeController extends Controller
{
    public function createAction(Request $request)
    {
        $theme = new Theme();

        $form = $this->get('form.factory')->create(ThemeType::class, $theme);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            try
            {
                $categorie = $em->getRepository('QuizBundle:Categorie')->find($form->getData()->getIdCategorie());
                $theme->setNameTheme($form->getData()->getNameTheme());
                $theme->setCategorie($categorie);
                $em->persist($theme);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Theme cree');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Theme deja existant');
            }
        }

        return $this->render('QuizBundle:Theme:create_theme.html.twig',array('form' => $form->createView()));
    }

    public function editAction(Request $request)
    {
        return $this->render('QuizBundle:Theme:edit_theme.html.twig');
    }

}
