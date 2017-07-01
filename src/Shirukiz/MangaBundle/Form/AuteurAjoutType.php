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


class AuteurAjoutType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('Nom',        TextType::class,array('label'=>'Nom de l\'auteur'))
        ->add('Prenom',        TextType::class,array('label'=>'Prenom de l\'auteur'));
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\MangaBundle\Entity\Auteur'
    ));
  }

}

