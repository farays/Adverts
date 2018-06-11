<?php
namespace Ads\AdvertsBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;


class AddannonceType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('titre',TextType::class,array())
                ->add('description',TextType::class,array('label'  => 'Description de votre annonce'))
                ->add('prix', NumberType::class,array('label'  => 'Prix'))
                ->add('idcategorie',EntityType::class, array(
                    'placeholder' => 'Choisir une catégorie',
                    'class' => 'AdsAdvertsBundle:Categorie'
                    ))
                ->add('file',FileType::class,array(
                    'required'=>false
                ))
                ->add('publier',SubmitType::class);
    }
}