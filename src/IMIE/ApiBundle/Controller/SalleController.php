<?php

namespace IMIE\ApiBundle\Controller;

/*use Symfony\Bundle\FrameworkBundle\Controller\Controller;*/
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SalleController extends Controller
{
    public function getSalleAllAction()
    {
    // Recuperation du repository
      $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');

      // Recuperation de la liste des salles puis envoi à la vue
      $listSalle = $repository->findall();
      return $listSalle;
    }


    public function getSalleAction($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');
        $salle = $repository->find($id);
        return $salle;

    }
}

?>