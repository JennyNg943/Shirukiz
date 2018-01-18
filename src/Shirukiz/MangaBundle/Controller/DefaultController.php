<?php

namespace Shirukiz\MangaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Shirukiz\MangaBundle\Form\RechercheType;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('fos_user_security_login');
        }else{
            
            $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
            $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Jeux');
            
            $livre = $repository->getVolumeA();
            $jeux = $repository2->getJeuxA();
            return $this->render('ShirukizMangaBundle:Default:index.html.twig',array('livre'=>$livre,'jeux'=>$jeux));
        }
        
    }
    
    public function rechercheAction(Request $request){
        $Recherche = $request->get('recherche');
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Livre');
        $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Jeux');
        $liste1 = $repository->getRecherche($Recherche);
        $liste2 = $repository2->getRecherche($Recherche);
        return $this->render('ShirukizMangaBundle:Default:rechercheResultat.html.twig',array(
            'listeManga'=>$liste1,
            'listeJeux' =>$liste2
        ));

 
    }
    
    public function utilisateurAction(Request $request){
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizUserBundle:User');
        $user = $repository->findAll();
        
        return $this->render('ShirukizMangaBundle:Default:Utilisateur.html.twig',array(
            'utilisateur'=>$user
        ));
    }
}
