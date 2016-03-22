<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Experience;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExperienceController extends Controller
{
    /**
     * @Route("/experience/", name="user_experience")
     */
    public function indexAction()
    {
        return $this->render('userspace/experience/index.html.twig', array('user' => $this->getUser()));
    }

    /**
     * @Route("/experience/add", name="user_experience_add")
     */
    public function addAction(Request $request)
    {
        $Experience = new Experience();
        $Experience->setUser($this->getUser());
        $form = $this->createFormBuilder($Experience)
            ->add('name', TextType::class, array(
                'label' => 'Nom',
            ))
            ->add('position', TextType::class, array(
                'label' => 'Poste',
            ))
            ->add('company', TextType::class, array(
                'label' => 'Entreprise',
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
            ))
            ->add('location', TextType::class, array(
                'label' => 'Endroit',
            ))
            ->add('save', SubmitType::class, array(
                'label' => "Ajouter l'expérience"
            ))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Experience = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Experience);
            $em->flush();

            return $this->redirectToRoute('user_experience');
        }

        return $this->render('userspace/experience/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/experience/edit/{id}", name="user_experience_edit")
     */
    public function editAction(Request $request, $id)
    {
        $Experience = $product = $this->getDoctrine()
            ->getRepository('AppBundle:Experience')
            ->find($id);
        $form = $this->createFormBuilder($Experience)
            ->add('name', TextType::class, array(
                'label' => 'Nom',
            ))
            ->add('position', TextType::class, array(
                'label' => 'Poste',
            ))
            ->add('company', TextType::class, array(
                'label' => 'Entreprise',
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
            ))
            ->add('location', TextType::class, array(
                'label' => 'Endroit',
            ))
            ->add('save', SubmitType::class, array(
                'label' => "Éditer l'expérience"
            ))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Experience = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Experience);
            $em->flush();

            return $this->redirectToRoute('user_experience');
        }

        return $this->render('userspace/experience/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/experience/delete/{id}", name="user_experience_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Experience = $product = $this->getDoctrine()
            ->getRepository('AppBundle:Experience')
            ->find($id);
        $em->remove($Experience);
        $em->flush();
        return $this->redirectToRoute('user_experience');
    }
}
