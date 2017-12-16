<?php

namespace Shirukiz\MangaBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Shirukiz\MangaBundle\Form\ImageType;


class FigurineType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('nom',            TextType::class,array('label'=>'Titre'))
        ->add('image',      ImageType::class)
        ->add('Confirmer',      SubmitType::class);
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\MangaBundle\Entity\Figurine'
    ));
  }

}

