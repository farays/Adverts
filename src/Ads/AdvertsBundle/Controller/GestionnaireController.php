<?php

namespace Ads\AdvertsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GestionnaireController extends Controller
{
    /**
     * @Route("/gest", name="gest")
     */
    public function gestAction()
    {
        return $this->render('@AdsAdverts/Admin/gestionnaire.html.twig');

    }
}
