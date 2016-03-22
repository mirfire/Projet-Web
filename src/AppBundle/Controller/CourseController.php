<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
*@Route("/course", name="user/course")
*/
class CourseController extends Controller
{
  /**
  *@Route("/course/add", name="user/course/add")
  */
    public function AddCourseAction(Request $request)
        {
            $course = new Course();

            $em = $this->getDoctrine()->getManager();
            $course->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new CourseType(), $course);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($course);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Formation cree.');

                return $this->redirect($this->generateUrl('Course'));
            }

            return $this->render('add-course.html.twig', array('form' => $form->createView()) );
        }
        /**
        *@Route("/course/edit", name="user/course/edit")
        */
    public function EditCourseAction(Request $request)
          {
                $course = new Course();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($course);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($course);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Formation enregistree.');

                    return $this->redirect($this->generateUrl('Course'));
                }

                return $this->render('edit-course.html.twig', array('form' => $form->createView()) );
          }
          /**
          *@Route("/course/remove", name="user/course/remove")
          */
    public function RemoveCourseAction(Request $request)
                {
                    $course = new Course();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->removeForm($course);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->remove($course);
                        $em->flush();

                        $request->getSession()->getFlashBag()->remove('notice', 'Formation Supprimee.');

                        return $this->redirect($this->generateUrl('Course'));
                    }

                    return $this->render('remove-course.html.twig', array('form' => $form->createView()) );
                }
}
