<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    public function AddSkillAction(Request $request)
        {
            $competences = new competence();

            $em = $this->getDoctrine()->getManager();
            $competences->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new CompetenceType(), $competences);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($competences);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Competence cree.');

                return $this->redirect($this->generateUrl('skill'));
            }

            return $this->render('add-skill.html.twig', array('form' => $form->createView()) );
        }

    public function EditSkillAction(Request $request)
          {
                $competences = new competence();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($competences);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($competences);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Competence enregistree.');

                    return $this->redirect($this->generateUrl('skill'));
                }

                return $this->render('edit-skill.html.twig', array('form' => $form->createView()) );
          }

    public function RemoveSkillAction(Request $request)
                {
                    $competences = new competence();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->removeForm($competences);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->remove($competences);
                        $em->flush();

                        $request->getSession()->getFlashBag()->remove('notice', 'Competence Supprimee.');

                        return $this->redirect($this->generateUrl('skill'));
                    }

                    return $this->render('remove-skill.html.twig', array('form' => $form->createView()) );
                }
}
