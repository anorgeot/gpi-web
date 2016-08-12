<?php

// src/IMIE/CoreBundle/Controller/typeMaterielController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Materiel;
use IMIE\CoreBundle\Form\MaterielType;
use IMIE\CoreBundle\Form\TypePcType;
use IMIE\CoreBundle\Form\TypePeripheriqueType;
use IMIE\CoreBundle\Form\TypeTactilType;
use IMIE\CoreBundle\Form\TypeReseauType;
use IMIE\CoreBundle\Entity\TypeMateriel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TypeMaterielController extends Controller
{
  public function indexAction($categorie)
  {
    // On fait appel au service entity manager
    $em = $this->getDoctrine()->getManager();

    $categorie=ucfirst($categorie);
    // Ici, on récupérera la liste des pc, puis on la passera au templPate
    $list = $em->getRepository('IMIECoreBundle:TypeMateriel')->findby(array('materiel'=>$categorie));

    return $this->render('IMIECoreBundle:Materiel_type/'.$categorie.':index.html.twig',array(
      'listType'.$categorie => $list
      ));
  }

  public function addAction( $categorie ,Request $request )
  {

      $catMateriel = new TypeMateriel();
      $catMateriel->setMateriel( $categorie );

      if  ($categorie=="pc")
      {
          $listchoix=array('Fixe' => 'Fixe', 'Portable' => 'Portable');
          $form = $this->get('form.factory')->create(
          new TypePcType (array(
          'type' => $listchoix,
          'ram_required' => true,
          'disque_required' => true,
          'processeur_required' => true,
          'cm_required' => true,
          )), $catMateriel) ;
      }

      if  ($categorie=="peripherique")
      {
          $listchoix=array('Souris' => 'Souris', 'Clavier' => 'Clavier', 'Ecran'=>'Ecran');
          $form = $this->get('form.factory')->create(
          new TypePeripheriqueType (array(
          'type' => $listchoix,
          )), $catMateriel) ;          

      }
      if  ($categorie=="tactil")
      {
          $listchoix=array('Smartphone' => 'Smartphone', 'Tablette' => 'Tablette');
          $form = $this->get('form.factory')->create(
          new TypeTactilType (array(
          'type' => $listchoix,
          )), $catMateriel) ;           
      }
      if  ($categorie=="reseau")
      {
          $listchoix=array('Switch' => 'Switch', 'Routeur' => 'Routeur');
          $form = $this->get('form.factory')->create(
          new TypeReseauType (array(          
          'type' => $listchoix,
          'vitesse_required' => true,
          'port_required' => true,
          )), $catMateriel) ;            
      }

      $form->handleRequest($request);

      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($catMateriel);
          $em->flush();


          return $this->redirect($this->generateUrl('imie_core_type_materiel_index',array ('categorie'=>$categorie ))) ;
      }
      else
      {
          return $this->render('IMIECoreBundle:Materiel_type/'.ucfirst($categorie).':add.html.twig', array('form' => $form->createView() ));
      }
  }

  public function editAction($categorie, $id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:TypeMateriel');
      $tm = $repository->find($id);

      if  ($categorie=="pc")
      {
          $listchoix=array('Fixe' => 'Fixe', 'Portable' => 'Portable');
          $form = $this->get('form.factory')->create(
          new TypePcType (array(
          'type' => $listchoix,
          'ram_required' => true,
          'disque_required' => true,
          'processeur_required' => true,
          'cm_required' => true,
          )), $tm) ;
      }

      if  ($categorie=="peripherique")
      {
          $listchoix=array('Souris' => 'Souris', 'Clavier' => 'Clavier', 'Ecran'=>'Ecran');
          $form = $this->get('form.factory')->create(
          new TypePeripheriqueType (array(
          'type' => $listchoix,
          )), $tm) ;          

      }
      if  ($categorie=="tactil")
      {
          $listchoix=array('Smartphone' => 'Smartphone', 'Tablette' => 'Tablette');
          $form = $this->get('form.factory')->create(
          new TypeTactilType (array(
          'type' => $listchoix,
          )), $tm) ;           
      }
      if  ($categorie=="reseau")
      {
          $listchoix=array('Switch' => 'Switch', 'Routeur' => 'Routeur');
          $form = $this->get('form.factory')->create(
          new TypeReseauType (array(          
          'type' => $listchoix,
          'vitesse_required' => true,
          'port_required' => true,
          )), $tm) ;            
      }
      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($tm);
          $em->flush();
          return $this->redirect($this->generateUrl('imie_core_type_materiel_index',array ('categorie'=>$categorie ))) ;
      }
      else
      {
          return $this->render('IMIECoreBundle:Materiel_type/'.ucfirst($categorie).':add.html.twig', array('form' => $form->createView() ));
      }
  }

  public function deleteAction($categorie,$id)
  {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('IMIECoreBundle:TypeMateriel');

      $typeMateriel = $repository->find($id);
      $em->remove($typeMateriel);
      $em->flush();
      return $this->redirect($this->generateUrl('imie_core_type_materiel_index',array ('categorie'=>$categorie ))) ;
  }

  public function genererAction($id, $categorie, Request $request)
  {

      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('IMIECoreBundle:TypeMateriel');
      $typeMateriel = $repository->find($id);

      $materiel = new Materiel();
      $materiel->setTypeMateriel($typeMateriel);


      $form = $this->get('form.factory')->create(
      new MaterielType(array('cat'=>$categorie)), $materiel) ;

      $form->handleRequest($request);

      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($materiel);
          $em->flush();
          return $this->redirect($this->generateUrl('imie_core_type_materiel_index',array ('categorie'=>$categorie ))) ;
      }
      else
      {

          return $this->render('IMIECoreBundle:Materiel/'.ucfirst($categorie).':add.html.twig', array('form' => $form->createView() ));
      }






  }





}