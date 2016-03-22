<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Course;
use AppBundle\Form\CourseType;

class CourseController extends Controller
{
  /**
   * @Route("/course", name="user_course")
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
        $course = new Course();

        $em = $this->getDoctrine()->getManager();
        $course->setUser($this->getUser());
        $form = $this->createForm(new CourseType(), $course);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Formation cree.');

            return $this->render('default/index.html.twig');
        }
        return $this->render('userspace/course/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/course/edit/{id}", name="user_course_edit")
     */
    public function editAction(Request $request, $id)
    {
        $course = new Course();

        $em = $this->getDoctrine()->getManager();
        $form = $this->editForm($course);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->edit('notice', 'Formation enregistree.');

            return $this->redirect($this->generateUrl('Course'));
        }

        return $this->render('userspace/skill/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/course/delete/{id}", name="user_course_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $course = new Course();
        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($course);
        $em->delete($course);
        $em->flush();
    }
}
