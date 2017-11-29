<?php

namespace Shirukiz\FigurineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\FigurineBundle\Form\FigurineType;
use Shirukiz\FigurineBundle\Entity\Figurine;


class FigurineController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizFigurineBundle:Figurine');
        $figurin = $repository->getFigurine();
        $figurine = new Figurine();
        $form = $this->createForm(FigurineType::class, $figurine);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $figurine->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($figurine);
            $em->flush();
        }
        return $this->render('ShirukizFigurineBundle:Figurine:FigurineCollection.html.twig',array(
            'listefigurine'=>$figurin,
            'form'=>$form->createView()
        ));
    }
}