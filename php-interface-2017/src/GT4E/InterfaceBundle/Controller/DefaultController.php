<?php

namespace GT4E\InterfaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GT4EInterfaceBundle:Default:index.html.twig');
    }
}
