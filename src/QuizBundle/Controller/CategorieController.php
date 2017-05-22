<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Categorie;
use QuizBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategorieController extends Controller
{
    public function createAction(Request $request)
    {
        $cat = new Categorie();

        $form = $this->get('form.factory')->create(CategorieType::class, $cat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            try
            {
                $cat = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($cat);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Categorie cree');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Categorie deja existante');
            }
        }

        return $this->render('QuizBundle:Categorie:create_cat.html.twig', array('form' => $form->createView()));
    }

    public function editAction(Request $request)
    {
        $cat = new Categorie();
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(CategorieType::class, $cat, array('block_name' => 'edit_categorie'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $cat = $em->getRepository('QuizBundle:Categorie')->find($request->request->get('quizbundle_categorie')['id']);
            $cat->setNameCategorie($form->getData()->getNameCategorie());

            try
            {
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Categorie mis a jour');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Erreur mise a jour categorie');
            }
        }
        return $this->render('QuizBundle:Categorie:edit_cat.html.twig',array('form' => $form->createView()));
    }

    public function deleteAction(Request $request)
    {
        $cat = new Categorie();
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(CategorieType::class, $cat, array('block_name' => 'delete_categorie'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $cat = $em->getRepository('QuizBundle:Categorie')->find($request->request->get('quizbundle_categorie')['id']);

            try
            {
                $em->remove($cat);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success', 'Categorie Supprimer');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Erreur : Veuillez supprimer les themes lie a la categorie d\'abords');
            }
        }
        return $this->render('QuizBundle:Categorie:delete_cat.html.twig', array('form' => $form->createView()));
    }

}
