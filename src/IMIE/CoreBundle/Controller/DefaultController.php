<?php

namespace IMIE\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IMIECoreBundle:Default:index.html.twig');
    }

    public function menuAction()
    {
        return $this->render('IMIECoreBundle:menu.html.twig');
    }


}
