<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Ads\AdvertsBundle\Entity\Categorie;

class CategorieFixtures extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder()
	{
		return 1;
	}

	public function load(ObjectManager $manager)
	{
		$manager->getClassMetadata(Categorie::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
		
		$item1= new Categorie();
		$item1->setNomcate('fashion');
		$manager->persist($item1);

		$item2= new Categorie();
		$item2->setNomcate('informatique');
		$manager->persist($item2);
		
		$item3= new Categorie();
		$item3->setNomcate('maison');
		$manager->persist($item3);
		
		$item4= new Categorie();
		$item4->setNomcate('emploi');
		$manager->persist($item4);
		
		$item5= new Categorie();
		$item5->setNomcate('equipement');
		$manager->persist($item5);
		
		$item6= new Categorie();
		$item6->setNomcate('immobilier');
		$manager->persist($item6);
		
		$item7= new Categorie();
		$item7->setNomcate('evenement');
		$manager->persist($item7);

		$manager->flush();
	}

}