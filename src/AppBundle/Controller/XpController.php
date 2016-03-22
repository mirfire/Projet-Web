<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class XpController extends Controller
{
    public function AddXpAction(Request $request)
        {
            $xp = new xp();

            $em = $this->getDoctrine()->getManager();
            $xp->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new xpType(), $xp);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($xp);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Experience cree.');

                return $this->redirect($this->generateUrl('xp'));
            }

            return $this->render('add-xp.html.twig', array('form' => $form->createView()) );
        }

    public function EditXpAction(Request $request)
          {
                $xp = new xp();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($xp);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($xp);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Experience enregistree.');

                    return $this->redirect($this->generateUrl('xp'));
                }

                return $this->render('edit-xp.html.twig', array('form' => $form->createView()) );
          }

    public function RemoveXpAction(Request $request)
                {
                    $xp = new xp();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->removeForm($xp);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->remove($xp);
                        $em->flush();

                        $request->getSession()->getFlashBag()->remove('notice', 'Experience Supprimee.');

                        return $this->redirect($this->generateUrl('xp'));
                    }

                    return $this->render('remove-xp.html.twig', array('form' => $form->createView()) );
                }
}
