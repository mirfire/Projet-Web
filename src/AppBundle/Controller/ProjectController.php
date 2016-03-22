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

            return $this->render('project-add.html.twig', array('form' => $form->createView()) );
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

                return $this->render('project-edit.html.twig', array('form' => $form->createView()) );
          }
          /**
          *@Route("/project/delete", name="user/project/delete")
          */
    public function DeleteProjectAction(Request $request)
                {
                    $project = new Project();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->deleteForm($project);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->delete($project);
                        $em->flush();

                        $request->getSession()->getFlashBag()->delete('notice', 'Projet Supprimee.');

                        return $this->redirect($this->generateUrl('Project'));
                    }

                    return $this->render('project-delete.html.twig', array('form' => $form->createView()) );
                }
}
