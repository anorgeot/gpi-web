<?php

// src/IMIE/CoreBundle/Controller/CmController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Cm;
use IMIE\CoreBundle\Form\CmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CmController extends Controller
{
  public function indexAction()
  {
    // On fait appel au service entity manager
    $em = $this->getDoctrine()->getManager();

    // Ici, on récupérera la liste des Cm, puis on la passera au template
    $listCm = $em->getRepository('IMIECoreBundle:Cm')->findall();

    return $this->render('IMIECoreBundle:Composant/Cm:index.html.twig',array(
      'listCm' => $listCm
      ));
  }


   public function addAction(Request $request)
  {
      $cm = new Cm();
      $form = $this->get('form.factory')->create(new CmType, $cm) ;

      // La variable $cm contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet $cm dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($cm);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Cm bien enregistrée.');
          // On redirige vers la page de visualisation des cms
          return $this->redirect($this->generateUrl('imie_core_cm_index'));
      }
      else
      {
          // le formulaire n'est pas valide car :
          // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
          // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
          return $this->render('IMIECoreBundle:Composant/Cm:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function editAction($id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Cm');
      $cm = $repository->find($id);

      $form = $this->get('form.factory')->create(new CmType, $cm) ;
      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($cm);
          $em->flush();
          $request->getSession()->getFlashBag()->add('notice', 'Cm Modifier.');
          return $this->redirect($this->generateUrl('imie_core_cm_index'));
      }
      else
      {
          return $this->render('IMIECoreBundle:Composant/Cm:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function deleteAction($id)
  {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('IMIECoreBundle:Cm');

      $cm = $repository->find($id);
      $em->remove($cm);
      $em->flush();
      return $this->redirect($this->generateUrl('imie_core_cm_index'));
  }
}