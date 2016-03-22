<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class XpController extends Controller
{
    /**
     * @Route("/xp", name="user_xp")
     */
    public function indexAction()
    {
        return $this->render('userspace/xp/index.html.twig', array('user' => $this->getUser()));
    }

    /**
     * @Route("/xp/add", name="user_xp_add")
     */
    public function addAction(Request $request)
    {
        $xp = new Xp();

        $em = $this->getDoctrine()->getManager();
        $xp->setProfil($this->getUser()->getProfil());
        $form = $this->createForm(new XpType(), $xp);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($xp);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Experience cree.');

            return $this->redirect($this->generateUrl('Xp'));
        }

        return $this->render('add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/xp/edit/{id}", name="user_xp_edit")
     */
    public function editAction(Request $request, $id)
    {
        $xp = new Xp();

        $em = $this->getDoctrine()->getManager();
        $form = $this->editForm($xp);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($xp);
            $em->flush();

            $request->getSession()->getFlashBag()->edit('notice', 'Experience enregistree.');

            return $this->redirect($this->generateUrl('Xp'));
        }

        return $this->render('edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/xp/delete/{id}", name="user_xp_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $xp = new Xp();

        $em = $this->getDoctrine()->getManager();
        $form = $this->deleteForm($xp);
        $em->delete($xp);
        $em->flush();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->delete($xp);
            $em->flush();

            $request->getSession()->getFlashBag()->delete('notice', 'Experience Supprimee.');

            return $this->redirect($this->generateUrl('Xp'));
        }

        return $this->render('xp-delete.html.twig', array('form' => $form->createView()));
    }
}
