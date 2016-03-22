<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/course", name="user/course")
 */
class CourseController extends Controller
{
    /**
     * @Route("/course/add", name="user_course_add")
     */
    public function addAction(Request $request)
    {
        $course = new Course();

        $em = $this->getDoctrine()->getManager();
        $course->setProfil($this->getUser()->getProfil());
        $form = $this->createForm(new CourseType(), $course);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Formation cree.');

            return $this->redirect($this->generateUrl('Course'));
        }

        return $this->render('course-add.html.twig', array('form' => $form->createView()));
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

        return $this->render('course-edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/course/delete/{id}", name="user_course_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $course = new Course();

        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($course);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->delete($course);
            $em->flush();

            $request->getSession()->getFlashBag()->delete('notice', 'Formation Supprimee.');

            return $this->redirect($this->generateUrl('Course'));
        }

        return $this->render('course-delete.html.twig', array('form' => $form->createView()));
    }
}
