<?php

namespace IMIE\ApiBundle\Controller;

/*use Symfony\Bundle\FrameworkBundle\Controller\Controller;*/
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PcController extends Controller
{

    public function getPcAction($id)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Materiel');
        $pc = $repository->find($id);
        return $pc;
    }//[GET] /pc/{id}
   

    public function getPcAllAction()
    {

        $em = $this->getDoctrine()->getManager();
        $listPc = $em->getRepository('IMIECoreBundle:Materiel')->findbyCat("pc");
        return $listPc;
    } 

    public function putPcSalleAction($idPc, $idSalle)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Materiel');
        $pc = $repository->find($idPc);

        $repository2 = $this->getDoctrine()->getManager()->getRepository('IMIECoreBundle:Salle');
        $salle = $repository2->find($idSalle);


        $pc-> setSalle($salle);
        $em = $this->getDoctrine()->getManager();
        $em-> persist($pc);
        $em->flush();
    }

}

?>