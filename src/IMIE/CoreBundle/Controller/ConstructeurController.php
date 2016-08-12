<?php

// src/IMIE/CoreBundle/Controller/ConstructeurController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Constructeur;
use IMIE\CoreBundle\Form\ConstructeurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ConstructeurController extends Controller
{

  public function indexAction()
  {
      // Recuperation du repository
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Constructeur');

      // Recuperation de la liste des constructeurs puis envoi à la vue
      $listConstructeur = $repository->findall();
      return $this->render('IMIECoreBundle:Constructeur:index.html.twig',array('listConstructeur' => $listConstructeur));
  }


  public function menuAction()
  {
      // Service entity manager
      $em = $this->getDoctrine()->getManager();

      //Recuperation de la liste des constructeurs puis envoi à la vue
      $listConstructeur = $em->getRepository('IMIECoreBundle:Constructeur')->findall();
      return $this->render('IMIECoreBundle:Constructeur:menu.html.twig',array('listConstructeur' => $listConstructeur));
  }



  public function addAction(Request $request)
  {
      $constructeur = new Constructeur();
      $form = $this->get('form.factory')->create(new ConstructeurType, $constructeur) ;

      // La variable $constructeur contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet $constructeur dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($constructeur);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Constructeur bien enregistrée.');
          // On redirige vers la page de visualisation des constructeurs
          return $this->redirect($this->generateUrl('imie_core_constructeur_index'));
      }
      else
      {
          // le formulaire n'est pas valide car :
          // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
          // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
          return $this->render('IMIECoreBundle:Constructeur:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function editAction($id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Constructeur');
      $constructeur = $repository->find($id);

      $form = $this->get('form.factory')->create(new ConstructeurType, $constructeur) ;
      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($constructeur);
          $em->flush();
          $request->getSession()->getFlashBag()->add('notice', 'Constructeur Modifier.');
          return $this->redirect($this->generateUrl('imie_core_constructeur_index'));
      }
      else
      {
          return $this->render('IMIECoreBundle:Constructeur:edit.html.twig', array('form' => $form->createView() ));
      }
  }


  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $repository = $em->getRepository('IMIECoreBundle:Constructeur');

    $constructeur = $repository->find($id);
    $em->remove($constructeur);
    $em->flush();
    return $this->redirect($this->generateUrl('imie_core_constructeur_index'));
  }
}