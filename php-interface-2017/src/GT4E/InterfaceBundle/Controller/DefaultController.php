<?php

namespace GT4E\InterfaceBundle\Controller;

use GT4E\InterfaceBundle\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GT4E\InterfaceBundle\Entity\Utilisateur;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        if ( ! $request->get('user') ||  !$request->get('password') )
            return $this->render('GT4EInterfaceBundle:Default:login.html.twig');
        else {
            $repository = $this->getDoctrine()->getRepository('GT4EInterfaceBundle:Utilisateur');
            $user = $repository->findOneByNom($request->get('user'));
            $pass = hash('sha256', $request->get('password'));
            if ($pass == $user->getHash()){
                
            }

        }
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
        $repository = $this->getDoctrine()->getRepository('GT4EInterfaceBundle:Utilisateur');
        $user = $repository->findOneByNom($request->get('client'));
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($user, 'json');
        return new Response($jsonContent);
    }

    public function getAllClientsAction(){
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $repository = $this->getDoctrine()->getRepository('GT4EInterfaceBundle:Utilisateur');
        $users = $repository->findAll();

        $jsonContent = $serializer->serialize($users, 'json');
        return new Response($jsonContent);
    }

    public function updateClientAction(Request $request)
    {

    }

    public function createClientAction(Request $request)
    {

        try{
            $user = new Utilisateur();
            $user->setNom($request->get('name'))
                ->setTelephone($request->get('phone'))
                ->setMail($request->get('email'))
                ->setAdresse($request->get('addr'))
                ->setAlert($request->get('alert'))
                ->setHash(hash('sha256', $request->get('password')))
                ->setLogo($request->get('img'));

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($user);
            $em->flush();

            return new Response("ok");
        }catch (Exception $e){
            return $e;
        }

    }

    public function addFaq(Request $request){
        try {
            $faq = new Faq();
            $faq->setCategorie($request->get('categorie'))
                ->setQuestion($request->get('question'))
                ->setReponse($request->get('reponse'));

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($faq);
            $em->flush();
        } catch (Exception $e){
            //c'est la vie
        }
    }


}
