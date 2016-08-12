<?php

// src/IMIE/CoreBundle/Controller/RestController.php

namespace IMIE\CoreBundle\Controller;

use IMIE\CoreBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class RestController extends Controller
{


    public function getAllSalleAction()
    {
        // On récupère le repository
        $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');

        // Ici, on récupérera la liste des salles, puis on la passera au template
        $listSalle=array();

        $liste = $repository->findall();
        print_r($liste);
        foreach ($liste as $salle)
        {

            utf8_encode($salle->getNom());

            array_push($listSalle, $salle);
        }
        $listSalle = json_encode($listSalle);
        return $listSalle;
    }

    public function getSalleAction($id)
    {
        //code
        encode($salle);
    }

    public function encode($reponse)
    {
        $response = $this->encodeJson($reponse);
        return $reponse;
    }



}