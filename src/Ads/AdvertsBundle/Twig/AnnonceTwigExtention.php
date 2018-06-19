<?php
namespace Ads\AdvertsBundle\Twig;

use Ads\AdvertsBundle\Entity\Annonce;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;

class AnnonceTwigExtention extends \Twig_Extension
{
    protected $manager;
    protected $formFactory;
    public function __construct(ObjectManager $manager, FormFactoryInterface $formFactory)
    {
        $this->manager = $manager;
        $this->formFactory = $formFactory;
    }
    public function getFunctions()
    {
        return [
          new \Twig_SimpleFunction('get_annonce_by_categorie',[$this,'getAnnonceByCategorie']),
          new \Twig_SimpleFunction('get_all_annonces',[$this,'getAllAnnonces']),
          new \Twig_SimpleFunction('form_type',[$this,'returnFormType']),
          new \Twig_SimpleFunction('get_all_my_annonce',[$this,'getAllMyAnnonce'])
        ];
    }
    public function getAnnonceByCategorie($categories = [])
    {
        $annonces = $this->manager->getRepository(Annonce::class)->getEmplois(4);
        $data = [];
        $colors = ['yellow','grey','lime'];
//        $i = 0;
        foreach ($annonces as $annonce )
        {
            if($this->isCategorie($annonce->getIdcategorie()->getNomcate(),$categories))
            {
                $data[] = $annonce;
            }
//            $data[] = ['id'=>$annonce->getId(),'nom'=>$annonce->getTitre(),'couleur'=>rand(0,2),'description'=>$emploi->getDescription()];
//            $i++;
        }
        return $data;
    }
    private function isCategorie($categorie , $categories)
    {
        return in_array($categorie,$categories);
    }

    public function getAllAnnonces($categories = [])
    {

        $annonces = $this->manager->getRepository(Annonce::class)->getAllAds();
        $data = [];

        foreach ($annonces as $annonce )
        {
            if($this->isCategorie($annonce->getIdcategorie()->getNomcate(),$categories))
            {
                $data[] = $annonce;
            }
        }
//
        return $data;
    }

    public function returnFormType($formtype)
    {
        return $this->formFactory->create($formtype)->createView();
    }

    public function getAllMyAnnonce($user)
    {

        $annonces = $this->manager->getRepository(Annonce::class)->getMyAds($user);
        $data = [];

        foreach ($annonces as $annonce )
        {
                $data[] = $annonce;

        }
//
        return $data;
    }
}