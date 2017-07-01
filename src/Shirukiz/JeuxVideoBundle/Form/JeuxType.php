<?php

namespace Shirukiz\JeuxVideoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Shirukiz\MangaBundle\Form\AuteurAjoutType;
use Shirukiz\MangaBundle\Form\ImageType;


class JeuxType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('nom',            TextType::class,array('label'=>'Titre'))
        ->add('plateforme',     EntityType::class,array(
                  'class'=>'ShirukizJeuxVideoBundle:Plateforme',
                  'choice_label'=>'nom'
            ))
        ->add('genre',          TextType::class)
        ->add('multijoueur',    TextType::class)
        ->add('image',      ImageType::class)
        ->add('Confirmer',      SubmitType::class);
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\JeuxVideoBundle\Entity\Jeux'
    ));
  }

}
