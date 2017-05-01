<?php

namespace GT4E\InterfaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GT4E\InterfaceBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GT4EInterfaceBundle:Default:index.html.twig');
    }

    public function loginAction()
    {
        return $this->render('GT4EInterfaceBundle:Default:login.html.twig');
    }

    public function adminAction()
    {
        return $this->render('GT4EInterfaceBundle:Default:admin.html.twig');
    }

    public function getClientAction(Request $request)
    {

    }

    public function updateClientAction(Request $request)
    {

    }

    public function createClientAction(Request $request)
    {

        $user = new Utilisateur();
        $user->setNom($request->get('name'))
            ->setTelephone($request->get('phone'))
            ->setMail($request->get('email'))
            ->setAddresse($request->get('addr'))
            ->setAlert($request->get('alert'))
            ->setHash(hash('sha256', $request->get('password')))
            ->setLogo($request->get('img'));

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();

        return true;
    }


}
