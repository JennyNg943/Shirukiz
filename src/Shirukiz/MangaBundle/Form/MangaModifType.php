<?php

namespace Shirukiz\MangaBundle\Form;


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


class MangaModifType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('nom',        TextType::class,array('label'=>'Titre'))
        ->add('auteur',     TextType::class)
        ->add('genre',      EntityType::class,array(
                  'class'=>'ShirukizMangaBundle:Genre',
                  'choice_label'=>'nom'
            ))
        ->add('type',       EntityType::class,array(
                  'class'=>'ShirukizMangaBundle:Type',
                  'choice_label'=>'nom'
            ))
        ->add('editeur',    EntityType::class,array(
                  'class'=>'ShirukizMangaBundle:Editeur',
                  'choice_label'=>'nom'
            ))
        ->add('Description',    TextareaType::class)
        ->add('nbVolume',   TextType::class)
        ->add('statut',     EntityType::class,array(
                  'class'=>'ShirukizMangaBundle:Statut',
                  'choice_label'=>'nom'))
        ->add('Confirmer',      SubmitType::class);
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\MangaBundle\Entity\Livre'
    ));
  }

}

