<?php
/**
 * Created by PhpStorm.
 * User: link
 * Date: 21/03/2016
 * Time: 11:31
 */

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CvController extends Controller
{
    /**
     * @Route("/cv/{id}", name="cv_index")
     */
    public function indexAction(Request $request, $id)
    {
        $User = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);
        // replace this example code with whatever you need
        return $this->render('cv.html.twig', array(
            'user' => $User,
            'logged' => $this->getUser(),
        ));
    }

    /**
     * @Route("/cv/{id}/contact", name="cv_contact")
     */
    public function contactAction(Request $request, $id)
    {
        $User = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);

        $form = $this->createFormBuilder()
            ->add('name', TextType::class, array(
                'label' => 'Nom',))
            ->add('email', EmailType::class, array(
                'label' => 'Email',))
            ->add('subject', TextType::class, array(
                'label' => 'Sujet',))
            ->add('message', TextareaType::class, array(
                'label' => 'Message',
                'attr' => array(
                    'rows' => 5,)))
            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer un Mail'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('subject')->getData())
                ->setFrom($form->get('email')->getData())
                ->setTo($User->getEmail())
                ->setBody(
                    $this->renderView(
                        'mail/contact.html.twig',
                        array(
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData()
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('cv_index', array(
                'id' => $User->getId()
            ));
        }
        return $this->render('contact.html.twig', array(
            'user' => $User,
            'form' => $form->createView(),
        ));
    }
}
