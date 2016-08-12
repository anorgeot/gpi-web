<?php

namespace IMIE\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
	    return $this->redirectToRoute('imie_core_materiel_salle_index', array("idSalle" => "all"));

	}
}
