<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use Proxies\__CG__\AppBundle\Entity\SkillCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    /**
     * @Route("/skill/", name="user_skill")
     */
    public function indexAction(Request $request)
    {
        return $this->render('userspace/skill/index.html.twig', array('user' => $this->getUser()));
    }


    /**
     * @Route("/skill/add", name="user_skill_add")
     */
    public function addAction(Request $request)
    {
        $skill = new Skill();
    }

    /**
     * @Route("/skill/edit/{id}", name="user_skill_edit")
     */
    public function editAction(Request $request, $id)
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

        return $this->render('edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/skill/delete/{id}", name="user_skill_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $skill = new Skill();
        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($skill);
        $em->delete($skill);
        $em->flush();
    }

    /**
     * @Route("/skill/add/category/", name="user_skill_add_category")
     */
    public function addCategoryAction(Request $request) {
        $SkillCategory = new SkillCategory();
        $SkillCategory->setUser($this->getUser());
        $form_category = $this->createFormBuilder($SkillCategory)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Créer la Catégorie'))
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('task_success');
        }

        return $this->render('userspace/skill/add.html.twig', array(
            'form_category' => $form_category->createView(),
        ));
    }
}
