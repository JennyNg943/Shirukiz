<?php

namespace Shirukiz\AnimeBundle\Form;


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
use Shirukiz\MangaBundle\Form\ImageType;


class AnimeListeType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('idAnime',    EntityType::class,array(
            'label'=>'Titre',
            'class'=>'ShirukizAnimeBundle:Anime',
            'choice_label'=>'nom',
            'placeholder'=>''))
        ->add('nbVue',      TextType::class,array('label'=>'Nb épisodes vus'))
        ->add('statut',     EntityType::class,array(
            'label'=>'Statut',
            'class'=>'ShirukizMangaBundle:Statut',
            'choice_label'=>'nom',
            'placeholder'=>''))    
        ->add('Confirmer',      SubmitType::class);
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\AnimeBundle\Entity\AnimeUser'
    ));
  }

}

