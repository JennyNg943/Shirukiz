<?php

namespace Shirukiz\AnimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ShirukizAnimeBundle:Default:index.html.twig');
    }
}
