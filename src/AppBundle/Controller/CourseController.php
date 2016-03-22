<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Course;
use AppBundle\Form\CourseType;

class CourseController extends Controller
{
  /**
   * @Route("/course/", name="user_course")
   */
  public function indexAction()
  {
      return $this->render('userspace/course/index.html.twig', array('user' => $this->getUser()));
  }

    /**
     * @Route("/course/add", name="user_course_add")
     */
     public function addAction(Request $request)
     {
         $Course = new Course();
         $Course->setUser($this->getUser());
         $form_course = $this->createFormBuilder($Course)
         ->add('name', TextType::class, array(
           'label' => 'Nom'))
         ->add('description', TextType::class, array(
           'label' => 'Description'))
         ->add('date', TextType::class, array(
           'label' => 'Date de la formation'))
         ->add('diploma', TextType::class, array(
           'label' => 'Diplôme'))
         ->add('location', TextType::class, array(
           'label' => 'Lieu'))
          ->add('save', SubmitType::class, array(
           'label' => 'Ajouter la formation'))
          ->getForm();

         $form_course->handleRequest($request);
         if ($form_course->isSubmitted() && $form_course->isValid()) {
             $Course = $form_course->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($Course);
             $em->flush();

             return $this->redirectToRoute('user_course');
         }

         return $this->render('userspace/course/add.html.twig', array(
             'form' => $form_course->createView(),
         ));
     }

    /**
     * @Route("/course/edit/{id}", name="user_course_edit")
     */
     public function editAction(Request $request, $id)
     {
         $Course = $product = $this->getDoctrine()
             ->getRepository('AppBundle:Course')
             ->find($id);
         $form_course = $this->createFormBuilder($Course)
             ->add('name', TextType::class, array(
               'label' => 'Nom'))
             ->add('description', TextType::class, array(
               'label' => 'Description'))
             ->add('date', TextType::class, array(
               'label' => 'Date de la formation'))
             ->add('diploma', TextType::class, array(
               'label' => 'Diplôme'))
             ->add('location', TextType::class, array(
               'label' => 'Lieu'))
             ->add('save', SubmitType::class, array(
               'label' => 'Éditer la formation'))
             ->getForm();

         $form_course->handleRequest($request);
         if ($form_course->isSubmitted() && $form_course->isValid()) {
             $Course = $form_course->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($Course);
             $em->flush();

             return $this->redirectToRoute('user_course');
         }

         return $this->render('userspace/course/add.html.twig', array(
             'form' => $form_course->createView(),
         ));
     }


    /**
     * @Route("/course/delete/{id}", name="user_course_delete")
     */
     public function deleteAction(Request $request, $id)
     {
         $em = $this->getDoctrine()->getManager();
         $Course = $product = $this->getDoctrine()
             ->getRepository('AppBundle:Course')
             ->find($id);
         $em->remove($Course);
         $em->flush();
         return $this->redirectToRoute('user_course');
     }
}
