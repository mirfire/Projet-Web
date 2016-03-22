<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
*@Route("/xp", name="user/xp")
*/
class XpController extends Controller
{
    /**
    *@Route("/xp/add", name="user/xp/add")
    */
    public function AddXpAction(Request $request)
        {
            $xp = new Xp();

            $em = $this->getDoctrine()->getManager();
            $xp->setProfil($this->getUser()->getProfil());
            $form = $this->createForm(new XpType(), $xp);
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em->persist($xp);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Experience cree.');

                return $this->redirect($this->generateUrl('Xp'));
            }

            return $this->render('xp-add.html.twig', array('form' => $form->createView()) );
        }
        /**
        *@Route("/xp/edit", name="user/xp/edit")
        */
    public function EditXpAction(Request $request)
          {
                $xp = new Xp();

                $em = $this->getDoctrine()->getManager();
                $form = $this->editForm($xp);
                $form->handleRequest($request);

                if ($form->isValid())
                {
                    $em->persist($xp);
                    $em->flush();

                    $request->getSession()->getFlashBag()->edit('notice', 'Experience enregistree.');

                    return $this->redirect($this->generateUrl('Xp'));
                }

                return $this->render('xp-edit.html.twig', array('form' => $form->createView()) );
          }
          /**
          *@Route("/xp/delete", name="user/xp/delete")
          */
    public function DeleteXpAction(Request $request)
                {
                    $xp = new Xp();

                    $em = $this->getDoctrine()->getManager();
                    $form = $this->deleteForm($xp);
                    $form->handleRequest($request);

                    if ($form->isValid())
                    {
                        $em->delete($xp);
                        $em->flush();

                        $request->getSession()->getFlashBag()->delete('notice', 'Experience Supprimee.');

                        return $this->redirect($this->generateUrl('Xp'));
                    }

                    return $this->render('xp-delete.html.twig', array('form' => $form->createView()) );
                }
}
