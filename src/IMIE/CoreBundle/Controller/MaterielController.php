<?php

// src/IMIE/CoreBundle/Controller/PcController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Form\MaterielType;
use IMIE\CoreBundle\Entity\Materiel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class MaterielController extends Controller
{
    public function indexAction($categorie)
    {
        // On fait appel au service entity manager
        $em = $this->getDoctrine()->getManager();


        $categorie=ucfirst($categorie);
        // Ici, on récupérera la liste des Pc puis on la passera au templPate
        $list = $em->getRepository('IMIECoreBundle:Materiel')->findbyCat($categorie);


        return $this->render('IMIECoreBundle:Materiel/'.$categorie.':index.html.twig',array(
          'list'.$categorie => $list
          ));
    }

    public function salleIndexAction($idSalle)
    {
        // On fait appel au service entity manager
        $em = $this->getDoctrine()->getManager();

        if ($idSalle=="all")
        {
            // Ici, on récupére la liste de tout le materiel non détaillé puis on la passe au template
            $listMateriel = $em->getRepository('IMIECoreBundle:Materiel')->findAll();

            return $this->render('IMIECoreBundle:Materiel/Salle:index.html.twig',array(
              'listMateriel'=> $listMateriel
              ));
        }
        else
        {
            // Ici,on récupére la liste de tout le materiel pour la salle puis on la passe au templPate

            $listMateriel = $em->getRepository('IMIECoreBundle:Materiel')->findbySalle($idSalle);

            return $this->render('IMIECoreBundle:Materiel/Salle:index.html.twig',array(
                'listMateriel'=> $listMateriel
                ));             
        }
    }

  public function addAction( $categorie ,Request $request )
  {

      $materiel = new Materiel();

      $form = $this->get('form.factory')->create(
      new MaterielType(array('cat'=>$categorie)), $materiel) ;

      // La variable $catMateriel contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet catMateriel dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($materiel);
          $em->flush();
          return $this->redirect($this->generateUrl('imie_core_materiel_index',array ('categorie'=>$categorie ))) ;
      }
      else
      {

          return $this->render('IMIECoreBundle:Materiel/'.ucfirst($categorie).':add.html.twig', array('form' => $form->createView() ));
      }
  }

  public function editAction( $id, $categorie ,Request $request )
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Materiel');
      $materiel = $repository->find($id);
      $form = $this->get('form.factory')->create(
      new MaterielType(array('cat'=>$categorie)), $materiel) ;
      // La variable $catMateriel contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);
      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet catMateriel dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($materiel);
          $em->flush();
          return $this->redirect($this->generateUrl('imie_core_materiel_index',array ('categorie'=>$categorie ))) ;
      }
      else
      {
          return $this->render('IMIECoreBundle:Materiel/'.ucfirst($categorie).':edit.html.twig', array('form' => $form->createView() ));
      }
  }

  public function deleteAction($categorie,$id)
  {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('IMIECoreBundle:Materiel');

      $materiel = $repository->find($id);
      $em->remove($materiel);
      $em->flush();
      return $this->redirect($this->generateUrl('imie_core_materiel_index',array ('categorie'=>$categorie ))) ;
  }


}
