<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skill;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\AppBundle\Entity\SkillCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
     * @Route("/skill/add/", name="user_skill_add")
     */
    public function addAction(Request $request)
    {
        $Skill = new Skill();
        $Skill->setUser($this->getUser());
        $form_skill = $this->createFormBuilder($Skill)
            ->add('name', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('level', ChoiceType::class, array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ),
                'label' => 'Niveau'
            ))
            ->add('skill_category', EntityType::class, array(
                'class' => 'AppBundle:SkillCategory',
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
            ))
            ->add('save', SubmitType::class, array('label' => 'Ajouter la Compétence'))
            ->getForm();

        $form_skill->handleRequest($request);
        if ($form_skill->isSubmitted() && $form_skill->isValid()) {
            $Skill = $form_skill->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Skill);
            $em->flush();

            return $this->redirectToRoute('user_skill');
        }

        return $this->render('userspace/skill/add.html.twig', array(
            'form' => $form_skill->createView(),
        ));
    }

    /**
     * @Route("/skill/edit/{id}", name="user_skill_edit")
     */
    public function editAction(Request $request, $id)
    {
        $Skill = $product = $this->getDoctrine()
            ->getRepository('AppBundle:Skill')
            ->find($id);
        $form_skill = $this->createFormBuilder($Skill)
            ->add('name', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('level', ChoiceType::class, array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ),
                'label' => 'Niveau'
            ))
            ->add('skill_category', EntityType::class, array(
                'class' => 'AppBundle:SkillCategory',
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
            ))
            ->add('save', SubmitType::class, array('label' => 'Éditer la Compétence'))
            ->getForm();

        $form_skill->handleRequest($request);
        if ($form_skill->isSubmitted() && $form_skill->isValid()) {
            $Skill = $form_skill->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Skill);
            $em->flush();

            return $this->redirectToRoute('user_skill');
        }

        return $this->render('userspace/skill/add.html.twig', array(
            'form' => $form_skill->createView(),
        ));
    }

    /**
     * @Route("/skill/delete/{id}", name="user_skill_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $skill = new Skill();
        $em = $this->getDoctrine()->getManager();
        $em->delete($skill);
        $em->flush();
    }

    /**
     * @Route("/skill/category/add", name="user_skill_category_add")
     */
    public function addCategoryAction(Request $request)
    {
        $SkillCategory = new SkillCategory();
        $SkillCategory->setUser($this->getUser());
        $form_category = $this->createFormBuilder($SkillCategory)
            ->add('name', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Créer la Catégorie'
            ))
            ->getForm();

        $form_category->handleRequest($request);
        if ($form_category->isSubmitted() && $form_category->isValid()) {
            $SkillCategory = $form_category->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($SkillCategory);
            $em->flush();

            return $this->redirectToRoute('user_skill');
        }

        return $this->render('userspace/skill/add.html.twig', array(
            'form' => $form_category->createView(),
        ));
    }

    /**
     * @Route("/skill/category/delete/{id}", name="user_skill_category_delete")
     */
    public function deleteCategoryAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $SkillCategory = $product = $this->getDoctrine()
            ->getRepository('AppBundle:SkillCategory')
            ->find($id);
        $em->remove($SkillCategory);
        $em->flush();
        return $this->redirectToRoute('user_skill');
    }

    /**
     * @Route("/skill/category/edit/{id}", name="user_skill_category_edit")
     */
    public function editCategoryAction(Request $request, $id)
    {
        $SkillCategory = $product = $this->getDoctrine()
            ->getRepository('AppBundle:SkillCategory')
            ->find($id);
        $form_category = $this->createFormBuilder($SkillCategory)
            ->add('name', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Éditer la Catégorie'
            ))
            ->getForm();

        $form_category->handleRequest($request);
        if ($form_category->isSubmitted() && $form_category->isValid()) {
            $SkillCategory = $form_category->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($SkillCategory);
            $em->flush();

            return $this->redirectToRoute('user_skill');
        }

        return $this->render('userspace/skill/add.html.twig', array(
            'form' => $form_category->createView(),
        ));
    }
}
