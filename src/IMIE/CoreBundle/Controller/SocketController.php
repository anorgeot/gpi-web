<?php

// src/IMIE/CoreBundle/Controller/SocketController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Socket;
use IMIE\CoreBundle\Form\SocketType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class SocketController extends Controller
{
  public function indexAction()
  {
    // On fait appel au service entity manager
    $em = $this->getDoctrine()->getManager();

    // Ici, on récupérera la liste des Socket, puis on la passera au template
    $listSocket = $em->getRepository('IMIECoreBundle:Socket')->findall();

    return $this->render('IMIECoreBundle:Composant/Socket:index.html.twig',array(
      'listSocket' => $listSocket
      ));
  }


  public function addAction(Request $request)
  {
      $socket = new Socket();
      $form = $this->get('form.factory')->create(new SocketType, $socket) ;

      // La variable $socket contient les valeurs entrées dans le formulaire par le visiteur
      $form->handleRequest($request);

      // Verification des valeurs entrées.
      if ($form->isValid()) {
          // On l'enregistre notre objet $socket dans la bdd
          $em = $this->getDoctrine()->getManager();
          $em->persist($socket);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Socket bien enregistrée.');
          // On redirige vers la page de visualisation des sockets
          return $this->redirect($this->generateUrl('imie_core_socket_index'));
      }
      else
      {
          // le formulaire n'est pas valide car :
          // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
          // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
          return $this->render('IMIECoreBundle:Composant/Socket:add.html.twig', array('form' => $form->createView() ));
      }
  }


  public function editAction($id, Request $request)
  {
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Socket');
      $socket = $repository->find($id);

      $form = $this->get('form.factory')->create(new SocketType, $socket);

      
      $form->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($socket);
          $em->flush();
          $request->getSession()->getFlashBag()->add('notice', 'Socket Modifier.');
          return $this->redirect($this->generateUrl('imie_core_socket_index'));
      }
      else
      {
          return $this->render('IMIECoreBundle:Composant/Socket:edit.html.twig', array('form' => $form->createView() ));
      }
  }


  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $repository = $em->getRepository('IMIECoreBundle:Socket');

    $socket = $repository->find($id);
    $em->remove($socket);
    $em->flush();
    return $this->redirect($this->generateUrl('imie_core_socket_index'));
  }
}