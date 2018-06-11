<?php

namespace Ads\AdvertsBundle\Controller;

use Ads\AdvertsBundle\Entity\Annonce;
use Ads\AdvertsBundle\Form\AddannonceType;
use Ads\AdvertsBundle\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AnnonceController extends Controller
{
    /**
     * @Route("/newannonce", name="newannonce")
     */
    public function newAnnonceAction(Request $request)
    {
        $annonce = new Annonce();

        $form = $this->createForm(AddannonceType::class,$annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $annonce = $form->getData();
            $annonce->setIdclient($this->getUser());
            $file = $annonce->getFile();
                if($file Instanceof UploadedFile )
                {
                    $fileUploader = new FileUploader($this->getParameter('avatars_directory'));
                    $fileName = $fileUploader->upload($file, $annonce->getPhoto());
                    $annonce->setPhoto($fileName);
                }
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($annonce);
             $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@AdsAdverts/Annonce/addannonce.html.twig',array(
        'form' => $form->createView(),
    ));
    }
    /**
     * @Route("/all", name="all_")
     */
    public function allbycategorieAction(Request $request)
    {

        $categori = $request->query->get('categ');
        dump($categori);
        return $this->render('@AdsAdverts/Annonce/allannoncebycategorie.html.twig',array('categ'=>$categori));

    }
    /**
     * @Route("/delete/annonce", name="delete_annonce")
     */
    public function deleteannonceAction(Request $request)
    {
        $id = $request->query->get('id');
        $entityManager = $this->getDoctrine()->getManager();
        $annonce  = $entityManager->getRepository('AdsAdvertsBundle:Annonce')->find($id);
        $entityManager->remove($annonce);
        $entityManager->flush();
        //return $this->render('@AdsAdverts/Admin/gestionnaire.html.twig');
        return $this->redirectToRoute('gest');
    }
}
