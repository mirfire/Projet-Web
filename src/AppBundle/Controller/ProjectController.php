<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
*@Route("/project", name="user/project")
*/
class ProjectController extends Controller
{
  /**
  *@Route("/project/add", name="user/project/add")
  */
    public function AddProjectAction(Request $request)
        {
            $project = new Project();

            $em = $this->getDoctrine()->getManager();
            $project->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new ProjectType(), $project);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($project);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Projet cree.');

                return $this->redirect($this->generateUrl('Project'));
            }

            return $this->render('add-project.html.twig', array('form' => $form->createView()) );
        }
        /**
        *@Route("/project/edit", name="user/project/edit")
        */
    public function EditProjectAction(Request $request)
          {
                $project = new Project();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($project);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($project);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Projet enregistree.');

                    return $this->redirect($this->generateUrl('Project'));
                }

                return $this->render('edit-project.html.twig', array('form' => $form->createView()) );
          }
          /**
          *@Route("/project/remove", name="user/project/remove")
          */
    public function RemoveProjectAction(Request $request)
                {
                    $project = new Project();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->removeForm($project);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->remove($project);
                        $em->flush();

                        $request->getSession()->getFlashBag()->remove('notice', 'Projet Supprimee.');

                        return $this->redirect($this->generateUrl('Project'));
                    }

                    return $this->render('remove-project.html.twig', array('form' => $form->createView()) );
                }
}
