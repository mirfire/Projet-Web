<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    public function AddSkillAction(Request $request)
        {
            $skill = new skill();

            $em = $this->getDoctrine()->getManager();
            $skill->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new skillType(), $skill);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($skill);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Competence cree.');

                return $this->redirect($this->generateUrl('skill'));
            }

            return $this->render('add-skill.html.twig', array('form' => $form->createView()) );
        }

    public function EditSkillAction(Request $request)
          {
                $skill = new skill();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($skill);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($skill);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Competence enregistree.');

                    return $this->redirect($this->generateUrl('skill'));
                }

                return $this->render('edit-skill.html.twig', array('form' => $form->createView()) );
          }

    public function RemoveSkillAction(Request $request)
                {
                    $skill = new skill();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->removeForm($skill);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->remove($skill);
                        $em->flush();

                        $request->getSession()->getFlashBag()->remove('notice', 'Competence Supprimee.');

                        return $this->redirect($this->generateUrl('skill'));
                    }

                    return $this->render('remove-skill.html.twig', array('form' => $form->createView()) );
                }
}
