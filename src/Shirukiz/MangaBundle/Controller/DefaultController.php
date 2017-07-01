<?php

namespace Shirukiz\MangaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('fos_user_security_login');
        }else{
            
            $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizMangaBundle:Volume');
            $repository2 = $this->getDoctrine()->getManager()->getRepository('ShirukizJeuxVideoBundle:Jeux');
            
            $livre = $repository->getVolumeA();
            $jeux = $repository2->getJeuxA();
            return $this->render('ShirukizMangaBundle:Default:index.html.twig',array('livre'=>$livre,'jeux'=>$jeux));
        }
        
    }
    
    public function accueilAction()
    {
        
    }
}
