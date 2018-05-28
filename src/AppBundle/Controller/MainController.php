<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Annonce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainController extends Controller
{
    /**
     * @Route("/home")
     */
    public function indexAction()
    {
        
        $emplois = $this->getDoctrine()
            ->getRepository('AppBundle:Annonce')->findAll();
        return $this->render("pages/main.html.twig",['emploi'=>$emplois]);
    }

}
