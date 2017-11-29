<?php

namespace Shirukiz\JeuxVideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\JeuxVideoBundle\Entity\Jeux;
use Shirukiz\JeuxVideoBundle\Form\JeuxType;
use Shirukiz\JeuxVideoBundle\Entity\Plateforme;
use Shirukiz\JeuxVideoBundle\Form\PlateformType;

class JeuxVideoController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Jeux');
        $repository2=$this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Plateforme');
        $jeux = $repository->getJeux();
        $plateforme = $repository2->findAll();
        $jeuxNew = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeuxNew);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $jeuxNew->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeuxNew);
            $em->flush();
            
            $referer = $request->headers->get('referer');
            return $this->redirect($referer);
        }
        
        $plateform = new Plateforme();
        $form2 = $this->createForm(PlateformType::class,$plateform);
        if ($request->isMethod('POST') && $form2->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plateform);
            $em->flush();
            
            $referer = $request->headers->get('referer');
            return $this->redirect($referer);
            
        }
        
        return $this->render('ShirukizJeuxVideoBundle:Jeux:JeuxVideoCollection.html.twig',array(
            'listejeux'=>$jeux,
            'listePlateforme'=>$plateforme,
            'form'=>$form->createView(),
            'form2'=>$form2->createView()
        ));
    }
    
    public function deleteAction($id,Request $request){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Jeux');
        $jeux = $repository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($jeux);
        $em->flush();
        
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
