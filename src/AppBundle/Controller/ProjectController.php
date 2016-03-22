<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProjectController extends Controller
{
    /**
     * @Route("/project", name="user_project")
     */
    public function indexAction() {

    }

    /**
     * @Route("/project/add", name="user_project_add")
     */
    public function addAction(Request $request)
    {
        $project = new Project();

        $em = $this->getDoctrine()->getManager();
        $project->setProfil($this->getUser()->getProfil());
        $form = $this->createForm(new ProjectType(), $project);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($project);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Projet cree.');

            return $this->redirect($this->generateUrl('Project'));
        }

        return $this->render('add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/project/edit", name="user_project_edit")
     */
    public function editAction(Request $request)
    {
        $project = new Project();

        $em = $this->getDoctrine()->getManager();
        $form = $this->editForm($project);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($project);
            $em->flush();

            $request->getSession()->getFlashBag()->edit('notice', 'Projet enregistree.');

            return $this->redirect($this->generateUrl('Project'));
        }

        return $this->render('edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/project/delete", name="user_project_delete")
     */
    public function deleteAction(Request $request)
    {
        $project = new Project();
        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($project);
        $em->delete($project);
        $em->flush();
    }
}
