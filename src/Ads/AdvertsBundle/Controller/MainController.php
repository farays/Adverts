<?php

namespace Ads\AdvertsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ads\AdvertsBundle\Entity\Annonce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        
        $emplois = $this->getDoctrine()
            ->getRepository('AdsAdvertsBundle:Annonce')->findAll();
        return $this->render('@AdsAdverts/Main/main.html.twig',['emploi'=>$emplois]);

    }

    /**
     * @Route("/authoriz", name="authoriz")
     */
    public function authorizAction()
    {
        if($this->getUser()->hasRole("ROLE_SUPER_ADMIN"))
        {
           return $this->redirectToRoute('easyadmin');
        }
        else{
            return $this->redirectToRoute('home');
        }

    }

    /**
     * @Route("pages/main", name="alterner")
     */
    public function alterneAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $emplois = $em
            ->getRepository(Annonce::class)->getEmplois(4);
        $data = [];
        $colors = ['yellow','grey','lime'];
        $i = 0;
        foreach ($emplois as $emploi)
        {
                $data[] = ['id'=>$emploi->getId(),'nom'=>$emploi->getTitre(),'couleur'=>rand(0,2),'description'=>$emploi->getDescription()];
                $i++;
        }
        return new JsonResponse($data);
    }
}
