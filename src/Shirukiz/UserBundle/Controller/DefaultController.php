<?php

namespace Shirukiz\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ShirukizUserBundle:Default:index.html.twig');
    }
}
