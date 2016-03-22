<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ProjectController extends Controller
{
  /**
   * @Route("project/", name="user_project")
   */
  public function indexAction()
  {
      return $this->render('userspace/project/index.html.twig', array('user' => $this->getUser()));
  }

    /**
     * @Route("/project/add", name="user_project_add")
     */
    public function addAction(Request $request)
    {
        $Project = new Project();
        $Project->setUser($this->getUser());
        $form = $this->createFormBuilder($Project)
            ->add('name', TextType::class, array(
                'label' => 'Nom',
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
            ))
            ->add('media', TextType::class, array(
                'label' => 'Image',
            ))
            ->add('link', TextType::class, array(
                'label' => 'Lien',
            ))
            ->add('sources', TextType::class, array(
                'label' => 'Source',
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Ajouter un Projet',
            ))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Project = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Project);
            $em->flush();

            return $this->redirectToRoute('user_project');
        }

        return $this->render('userspace/project/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/project/edit/{id}", name="user_project_edit")
     */
    public function editAction(Request $request, $id)
    {
        $Project = $this->getDoctrine()
            ->getRepository('AppBundle:Project')
            ->find($id);
        $Project->setUser($this->getUser());
        $form = $this->createFormBuilder($Project)
            ->add('name', TextType::class, array(
                'label' => 'Nom',
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description',
            ))
            ->add('media', TextType::class, array(
                'label' => 'Image',
            ))
            ->add('link', TextType::class, array(
                'label' => 'Lien',
            ))
            ->add('sources', TextType::class, array(
                'label' => 'Source',
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Éditer un Projet',
            ))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Project = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Project);
            $em->flush();

            return $this->redirectToRoute('user_project');
        }

        return $this->render('userspace/project/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/project/delete/{id}", name="user_project_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Project = $this->getDoctrine()
            ->getRepository('AppBundle:Project')
            ->find($id);
        $em->remove($Project);
        $em->flush();
        return $this->redirectToRoute('user_project');
    }
}
