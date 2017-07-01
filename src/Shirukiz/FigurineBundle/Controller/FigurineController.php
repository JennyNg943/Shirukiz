<?php

namespace Shirukiz\FigurineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\FigurineBundle\Form\FigurineType;
use Shirukiz\FigurineBundle\Entity\Figurine;


class FigurineController extends Controller
{
    public function indexAction()
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizFigurineBundle:Figurine');
        $figurine = $repository->getFigurine();
        
        return $this->render('ShirukizFigurineBundle:Figurine:FigurineCollection.html.twig',array(
            'listefigurine'=>$figurine,
        ));
    }
    
    public function ajoutAction(Request $request){
        $figurine = new Figurine();
        $form = $this->createForm(FigurineType::class, $figurine);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $figurine->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($figurine);
            $em->flush();
            return $this->redirectToRoute('shirukiz_figurine_collection');
        }
        return $this->render('ShirukizFigurineBundle:Figurine:FigurineAjout.html.twig',array('form'=>$form->createView()));
    }
}