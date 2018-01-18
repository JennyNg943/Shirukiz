<?php

namespace Shirukiz\ShirubiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ShirukizShirubiBundle:ImageShirubi');
        $image = $repository->getLastImage();
        return $this->render('ShirukizShirubiBundle:Default:index.html.twig');
    }
}
