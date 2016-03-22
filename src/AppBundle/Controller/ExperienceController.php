<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Xp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExperienceController extends Controller
{
    /**
     * @Route("/experience/", name="user_xp")
     */
    public function indexAction()
    {
        return $this->render('userspace/experience/index.html.twig', array('user' => $this->getUser()));
    }

    /**
     * @Route("/experience/add", name="user_experience_add")
     */
     public function addAction(Request $request)
     {
         $Xp = new Xp();
         $Xp->setUser($this->getUser());
         $form_xp = $this->createFormBuilder($Xp)
             ->add('name', TextType::class)
             ->add('position', TextType::class)
             ->add('company', TextType::class)
             ->add('description', TextType::class)
             ->add('location', TextType::class)
             ->getForm();

         $form_xp->handleRequest($request);
         if ($form_xp->isSubmitted() && $form_xp->isValid()) {
             $Xp = $form_xp->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($Xp);
             $em->flush();

             return $this->redirectToRoute('user_xp');
         }

         return $this->render('userspace/experience/add.html.twig', array(
             'form' => $form_xp->createView(),
         ));
     }
    /**
     * @Route("/experience/edit/{id}", name="user_experience_edit")
     */
    public function editAction(Request $request)
    {
      $Xp = $product = $this->getDoctrine()
          ->getRepository('AppBundle:Xp')
          ->find($id);
      $form_xp = $this->createFormBuilder($Xp)
            ->add('name', TextType::class)
            ->add('position', TextType::class)
            ->add('company', TextType::class)
            ->add('description', TextType::class)
            ->add('location', TextType::class)
            ->getForm();

            $form_xp->handleRequest($request);
            if ($form_xp->isSubmitted() && $form_xp->isValid()) {
                $Xp = $form_xp->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($Xp);
                $em->flush();

            return $this->redirectToRoute('user_xp');
        }

        return $this->render('userspace/experience/add.html.twig', array(
            'form' => $form_xp->createView(),
        ));
    }
    /**
     * @Route("/experience/delete/{id}", name="user_experience_delete")
     */
     public function deleteAction(Request $request, $id)
     {
         $xp = new Xp();
         $em = $this->getDoctrine()->getManager();
         $em->delete($xp);
         $em->flush();
     }
}
