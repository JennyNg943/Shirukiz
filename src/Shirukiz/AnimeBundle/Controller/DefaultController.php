<?php

namespace Shirukiz\AnimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\AnimeBundle\Repository\AnimeRepository;
use Shirukiz\AnimeBundle\Entity\Anime;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('ShirukizAnimeBundle:Anime');
        $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizUserBundle:User');
        $repository3 = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Statut');
        $user = $repository2->findAll();
        $listestatut = $repository3->getStatut();
        $anime = $repository->getAnime();
        $animeN = new Anime();
        $form = $this->createForm(\Shirukiz\AnimeBundle\Form\AnimeAjoutType::class, $animeN);
        
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $animeN->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($animeN);
            $em->flush();
        }
        
        $animeUser = new \Shirukiz\AnimeBundle\Entity\AnimeUser();
        $form2 = $this->createForm(\Shirukiz\AnimeBundle\Form\AnimeListeType::class);
        
        if ($request->isMethod('POST') && $form2->handleRequest($request)->isValid()) {
            $user = $this->getUser();
            $animeUser->setIdUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($animeUser);
            $em->flush();
        }
        
        
        
        return $this->render('ShirukizAnimeBundle:Anime:AnimeCollection.html.twig',array(
            'listeanime'=>$anime,
            'form'=>$form->createView(),
            'user'=>$user,
            'listestatut'=>$listestatut,
            'form2'=>$form2->createView()
        ));
    }
}
