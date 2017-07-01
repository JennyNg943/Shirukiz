<?php

namespace Shirukiz\MangaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Shirukiz\MangaBundle\Entity\Livre;
use Shirukiz\MangaBundle\Form\MangaAjoutType;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\MangaBundle\Form\VolumeByLivreType;
use Shirukiz\MangaBundle\Entity\Volume;
use Shirukiz\MangaBundle\Form\MangaModifType;
use Shirukiz\MangaBundle\Form\MangaImgBanType;
use Shirukiz\MangaBundle\Form\MangaImgType;

class MangaController extends Controller
{
    public function MangaCollectionAction()
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $repository2=$this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Statut');
        $manga = $repository->getManga();
        $statut = $repository2->getStatut();
        return $this->render('ShirukizMangaBundle:Manga:MangaCollection.html.twig',array(
            'listemanga'=>$manga,
            'listestatut'=>$statut,
        ));
    }
    
    public function MangaAjoutAction(Request $request){
        $manga = new Livre();
        $form = $this->createForm(MangaAjoutType::class, $manga);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manga->getImage()->upload();
            $manga->getImageBanniere()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($manga);
            $em->flush();
            return $this->redirectToRoute('shirukiz_manga_collection');
        }
        return $this->render('ShirukizMangaBundle:Manga:MangaAjout.html.twig',array('form'=>$form->createView()));
    }
    
    public function MangaVolumeAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $livre = $repository->find($id);
        $volume = new Volume();
        $volume->setIdLivre($livre);
        $form = $this->createForm(VolumeByLivreType::class,$volume);
        
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $volume->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($volume);
            $em->flush();
        }
        $listeVolume = $livre->getVolume();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $listeVolume, /* query NOT result */
            $request->query->get('page', 1)/*page number*/,
            12/*limit per page*/);
        return $this->render('ShirukizMangaBundle:Volume:Volume.html.twig',array(
            'form'=>$form->createView(),'livre'=>$livre,'paginator'=>$pagination));
    }
    
    public function MangaModifierAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $manga = $repository->find($id);
        $form = $this->createForm(MangaModifType::class, $manga);
 
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($manga);
            $em->flush();
            return $this->redirectToRoute('shirukiz_manga_volume',array('id'=>$id));
        }
        return $this->render('ShirukizMangaBundle:Manga:MangaModifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function MangaBanniereAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $manga = $repository->find($id);
        $form = $this->createForm(MangaImgBanType::class, $manga);
 
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manga->getImageBanniere()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($manga);
            $em->flush();
            return $this->redirectToRoute('shirukiz_manga_volume',array('id'=>$id));
        }
        return $this->render('ShirukizMangaBundle:Manga:MangaModifier.html.twig',array('form'=>$form->createView()));
    }
    
    public function MangaImageAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $manga = $repository->find($id);
        $form = $this->createForm(MangaImgType::class, $manga);
 
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manga->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($manga);
            $em->flush();
            return $this->redirectToRoute('shirukiz_manga_collection');
        }
        return $this->render('ShirukizMangaBundle:Manga:MangaModifier.html.twig',array('form'=>$form->createView()));
        
    }
    
    public function VolumeAjoutAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
        $volume = $repository->find($id);
        $volume->setPossession("Oui");
        $volume->setDateAchat(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($volume);
        $em->flush();
        
        $referer = $this->getRequest()->headers->get('referer');
        return $this->redirect($referer);
    }
}
