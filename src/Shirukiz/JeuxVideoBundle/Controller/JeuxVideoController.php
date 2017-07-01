<?php

namespace Shirukiz\JeuxVideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\JeuxVideoBundle\Entity\Jeux;
use Shirukiz\JeuxVideoBundle\Form\JeuxType;

class JeuxVideoController extends Controller
{
    public function indexAction()
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Jeux');
        $repository2=$this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Plateforme');
        $jeux = $repository->getJeux();
        $plateforme = $repository2->findAll();
        
        return $this->render('ShirukizJeuxVideoBundle:Jeux:JeuxVideoCollection.html.twig',array(
            'listejeux'=>$jeux,
            'listePlateforme'=>$plateforme
        ));
    }
    
    public function ajoutAction(Request $request){
        $jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeux);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $jeux->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            $em->flush();
            return $this->redirectToRoute('shirukiz_jeux_collection');
        }
        return $this->render('ShirukizJeuxVideoBundle:Jeux:JeuxAjout.html.twig',array('form'=>$form->createView()));
    }
    
    public function ajoutPlatformeAction(Request $request){
        $plateform = new Plateforme();
        $form = $this->createForm(PlateformType::class,$plateform);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plateform);
            $em->flush();
            return $this->redirectToRoute('shirukiz_jeux_collection');
        }
        return $this->render('ShirukizJeuxVideoBundle:Jeux:JeuxAjout.html.twig',array('form'=>$form->createView()));
    }
}
