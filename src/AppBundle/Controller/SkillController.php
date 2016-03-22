<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    /**
     * @Route("/skill/", name="user_skill")
     */
    public function indexAction(Request $request) {

    }


    /**
     * @Route("/skill/add", name="user_skill_add")
     */
    public function AddSkillAction(Request $request)
    {
        $skill = new Skill();

        $em = $this->getDoctrine()->getManager();
        $skill->setUser($this->getUser());
        $form = $this->createForm(new Skill(), $skill);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($skill);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Competence cree.');

            return $this->redirect($this->generateUrl('skill'));
        }

        return $this->render('skill-add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/skill/edit/", name="user_skill_edit")
     */
    public function EditSkillAction(Request $request)
    {
        $skill = new Skill();

        $em = $this->getDoctrine()->getManager();
        $form = $this->editForm($skill);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($skill);
            $em->flush();

            $request->getSession()->getFlashBag()->edit('notice', 'Competence enregistree.');

            return $this->redirect($this->generateUrl('skill'));
        }

        return $this->render('skill-edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/skill/delete/", name="user_skill_delete")
     */
    public function DeleteSkillAction(Request $request)
    {
        $skill = new Skill();

        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($skill);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->delete($skill);
            $em->flush();

            $request->getSession()->getFlashBag()->delete('notice', 'Competence Supprimee.');

            return $this->redirect($this->generateUrl('skill'));
        }

        return $this->render('skill-delete.html.twig', array('form' => $form->createView()));
    }
}
