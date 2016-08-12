<?php

// src/IMIE/CoreBundle/Controller/SalleController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Salle;
use IMIE\CoreBundle\Form\SalleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class SalleController extends Controller
{

  public function indexAction()
  {
      // Recuperation du repository
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');

      // Recuperation de la liste des salles puis envoi à la vue
      $listSalle = $repository->findall();
      return $this->render('IMIECoreBundle:Salle:index.html.twig',array('listSalle' => $listSalle));
  }


  public function menuAction()
  {
      // Service entity manager
      $em = $this->getDoctrine()->getManager();

      //Recuperation de la liste des salles puis envoi à la vue
      $listSalle = $em->getRepository('IMIECoreBundle:Salle')->findall();
      return $this->render('IMIECoreBundle:Salle:menu.html.twig',array('listSalle' => $listSalle));
  }



  public function addAction(Request $request)
  {
      $salle = new Salle();
      $form = $this->get('form.factory')->create(new SalleType, $salle) ;

      // La variable $salle contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet $salle dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($salle);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Salle bien enregistrée.');
          // On redirige vers la page de visualisation des salles
          return $this->redirect($this->generateUrl('imie_core_salle_index'));
      }
      else
      {
          // le formulaire n'est pas valide car :
          // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
          // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
          return $this->render('IMIECoreBundle:Salle:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function editAction($id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');
      $salle = $repository->find($id);

      $form = $this->get('form.factory')->create(new SalleType, $salle);

      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($salle);
          $em->flush();
          $request->getSession()->getFlashBag()->add('notice', 'Salle Modifier.');
          return $this->redirect($this->generateUrl('imie_core_salle_index'));
      }
      else
      {
          return $this->render('IMIECoreBundle:Salle:edit.html.twig', array('form' => $form->createView() ));
      }
  }


  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $repository = $em->getRepository('IMIECoreBundle:Salle');

    $salle = $repository->find($id);
    $em->remove($salle);
    $em->flush();
    return $this->redirect($this->generateUrl('imie_core_salle_index'));
  }
}