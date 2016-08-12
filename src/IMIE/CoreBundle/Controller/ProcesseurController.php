<?php

// src/IMIE/CoreBundle/Controller/ProcesseurController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Processeur;
use IMIE\CoreBundle\Form\ProcesseurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProcesseurController extends Controller
{
  public function indexAction()
  {
    // On fait appel au service entity manager
    $em = $this->getDoctrine()->getManager();

    // Ici, on récupérera la liste des Processeur, puis on la passera au template
    $listProcesseur = $em->getRepository('IMIECoreBundle:Processeur')->findall();

    return $this->render('IMIECoreBundle:Composant/Processeur:index.html.twig',array(
      'listProcesseur' => $listProcesseur
      ));
  }


  public function addAction(Request $request)
  {
      $processeur = new Processeur();
      $form = $this->get('form.factory')->create(new ProcesseurType, $processeur) ;

      // La variable $processeur contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet $processeur dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($processeur);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Processeur bien enregistrée.');
          // On redirige vers la page de visualisation des processeurs
          return $this->redirect($this->generateUrl('imie_core_processeur_index'));
      }
      else
      {
          // le formulaire n'est pas valide car :
          // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
          // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
          return $this->render('IMIECoreBundle:Composant/Processeur:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function editAction($id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Processeur');
      $processeur = $repository->find($id);

      $form = $this->get('form.factory')->create(new ProcesseurType, $processeur);

      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($processeur);
          $em->flush();
          $request->getSession()->getFlashBag()->add('notice', 'Processeur Modifier.');
          return $this->redirect($this->generateUrl('imie_core_processeur_index'));
      }
      else
      {
          return $this->render('IMIECoreBundle:Composant/Processeur:edit.html.twig', array('form' => $form->createView() ));
      }
  }


  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $repository = $em->getRepository('IMIECoreBundle:Processeur');

    $processeur = $repository->find($id);
    $em->remove($processeur);
    $em->flush();
    return $this->redirect($this->generateUrl('imie_core_processeur_index'));
  }
}