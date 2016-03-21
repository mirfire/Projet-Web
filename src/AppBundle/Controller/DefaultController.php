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
    /**
    *@Route("/mfolio", name="Monfolio")
    */
    public function monfolioAction(){
      return $this->render('Portfolio.html.twig');
    }
    /**
    *@Route("/mcv", name="MonCv")
    */
    public function moncvAction(){
      return $this->render('cv.html.twig');
    }
}
