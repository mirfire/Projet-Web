<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
    *@Route("/about", name="about")
    */
    public function aboutAction()
    {
      return $this->render('about.html.twig');
    }
    /**
    *@Route("/search", name="search")
    */
    public function researchAction()
    {
      return $this->render('search.html.twig');
    }
    /**
    *@Route("/folio", name="folio")
    */
    public function folioAction(){
      return $this->render('Portfolio.html.twig');
    }
    public function viewAction($name)

  {

    // On récupère le repository

    $repository = $this->getDoctrine()

      ->getManager()

      ->getRepository('AppBundle\Entity')

    ;
    // On récupère l'entité correspondante au nom $id

    $advert = $repository->find($name);

    // ou null si le nom  n'existe pas

    if (null === $advert) {

      throw new NotFoundHttpException("L'utilisateur: ".$name." n'existe pas.");

    }

    return $this->render('search.html.twig', array(

      'advert' => $advert

    ));

  }
}
