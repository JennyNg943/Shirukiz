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
use Symfony\Component\HttpFoundation\Response;

class MangaController extends Controller
{
    public function MangaCollectionAction(Request $request)
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $repository2=$this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Type');
        $manga = $repository->getManga();
        $type = $repository2->find(1);
        $livre = new Livre();
        $form = $this->createForm(MangaAjoutType::class, $livre);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $livre->setType($type);
            $livre->getImage()->upload();
            $livre->getImageBanniere()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();
            
            return $this->redirectToRoute('shirukiz_manga_volume',array('id'=>$livre->getId()));
        }
        
         
        
        return $this->render('ShirukizMangaBundle:Manga:MangaCollection.html.twig',array(
            'listemanga'=>$manga,
            'form'=>$form->createView()
        ));
    }
    
    public function MangaVolumeAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
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
        
        $form2 = $this->createForm(MangaModifType::class, $livre);
 
        if ($request->isMethod('POST') && $form2->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();
        }
        
        $form3 = $this->createForm(MangaImgBanType::class, $livre);
        
        if ($request->isMethod('POST') && $form3->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();
        }
        
        $form4 = $this->createForm(MangaImgType::class, $livre);
        if ($request->isMethod('POST') && $form4->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();
        }
        $listeVolume = $repository2->getVolumeLivre($id);
        
        return $this->render('ShirukizMangaBundle:Volume:Volume.html.twig',array(
            'livre'=>$livre,'paginator'=>$listeVolume,
            'form'  =>$form->createView(),
            'form2' =>$form2->createView(),
            'form3' =>$form3->createView(),
            'form4' =>$form4->createView()));
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
        }
        return $this->render('ShirukizMangaBundle:Manga:MangaModifier.html.twig',array('form'=>$form->createView()));
        
    }
    
    public function VolumeAjoutAction($id,Request $request){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
        $volume = $repository->find($id);
        $volume->setPossession(1);
        $volume->setDateAchat(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($volume);
        $em->flush();
        
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
    
    public function VolumeRejetAction($id,Request $request){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
        $volume = $repository->find($id);
        $volume->setPossession(Null);
        $volume->setDateAchat(Null);
        $em = $this->getDoctrine()->getManager();
        $em->persist($volume);
        $em->flush();
        
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
    
    public function VolumeSuppAction($id,Request $request){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
        $volume = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($volume);
        $em->flush();
        
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
    
    public function VolumePoAction(Request $request,$id){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
        $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $volume = $repository->getVolumePo($id);
        $livre = $repository2->find($id);
        
        $nb = ($volume/$livre->getNbVolume())*100;
        
        return new Response($nb);
    }
}
