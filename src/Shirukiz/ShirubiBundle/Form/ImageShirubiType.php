<?php

namespace Shirukiz\ShirubiBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ImageShirubiType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('file',        FileType::class,array('label'=>'Upload '))
        ->add('type',       EntityType::class,array(
                'class'=>'ShirukizMangaBundle:Type',
                'choice_label'=>'nom',
                'placeholder'=>'',
                'query_builder' => function(\Shirukiz\MangaBundle\Repository\TypeRepository $er)
                {
                    return $er->getTypeShirubi();
                },
            ))
            
        ;
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\ShirubiBundle\Entity\ImageShirubi'
    ));
  }

}

