<?php
/**
 * Created by PhpStorm.
 * User: link
 * Date: 21/03/2016
 * Time: 11:31
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CvController extends Controller
{
    /**
     * @Route("/cv/{username}", name="cv_index")
     */
    public function indexAction(Request $request, $username)
    {
        // replace this example code with whatever you need
        return $this->render('cv.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }
}
