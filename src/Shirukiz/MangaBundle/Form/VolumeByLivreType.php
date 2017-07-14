<?php

namespace Shirukiz\MangaBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Shirukiz\MangaBundle\Form\ImageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class VolumeByLivreType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('idLivre',        EntityType::class,array(
                'label'=>'Serie',
                'class'=>'ShirukizMangaBundle:Livre',
                'choice_label'=>'nom',
                'query_builder' => function (\Shirukiz\MangaBundle\Repository\MangaRepository $er) {
            return $er->createQueryBuilder('u')
                    ->orderBy('u.nom', 'ASC');},
                'placeholder'   => ''        ))
        ->add('Volume',         TextType::class)
        ->add('Image',          ImageType::class)
        ->add('possession',     ChoiceType::class,array(
            'choices'  => array(
                'Oui' => 1,
                'Non' => 2,)
           ))
        ->add('Ajouter',        SubmitType::class);
  }


  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Shirukiz\MangaBundle\Entity\Volume'
    ));
  }

}

