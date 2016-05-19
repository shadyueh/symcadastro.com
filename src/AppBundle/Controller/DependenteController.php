<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Dependente;
use AppBundle\Form\DependenteType;

/**
 * Dependente controller.
 *
 * @Route("/dependente")
 */
class DependenteController extends Controller
{
    /**
     * Lists all Dependente entities.
     *
     * @Route("/", name="dependente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dependentes = $em->getRepository('AppBundle:Dependente')->findAll();

        return $this->render('dependente/index.html.twig', array(
            'dependentes' => $dependentes,
        ));
    }

    /**
     * Creates a new Dependente entity.
     *
     * @Route("/new", name="dependente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dependente = new Dependente();
        $form = $this->createForm('AppBundle\Form\DependenteType', $dependente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dependente);
            $em->flush();

            return $this->redirectToRoute('dependente_show', array('id' => $dependente->getId()));
        }

        return $this->render('dependente/new.html.twig', array(
            'dependente' => $dependente,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Dependente entity.
     *
     * @Route("/{id}", name="dependente_show")
     * @Method("GET")
     */
    public function showAction(Dependente $dependente)
    {
        $deleteForm = $this->createDeleteForm($dependente);

        return $this->render('dependente/show.html.twig', array(
            'dependente' => $dependente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Dependente entity.
     *
     * @Route("/{id}/edit", name="dependente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dependente $dependente)
    {
        $deleteForm = $this->createDeleteForm($dependente);
        $editForm = $this->createForm('AppBundle\Form\DependenteType', $dependente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dependente);
            $em->flush();

            return $this->redirectToRoute('dependente_edit', array('id' => $dependente->getId()));
        }

        return $this->render('dependente/edit.html.twig', array(
            'dependente' => $dependente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Dependente entity.
     *
     * @Route("/{id}", name="dependente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dependente $dependente)
    {
        $form = $this->createDeleteForm($dependente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dependente);
            $em->flush();
        }

        return $this->redirectToRoute('dependente_index');
    }

    /**
     * Creates a form to delete a Dependente entity.
     *
     * @param Dependente $dependente The Dependente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dependente $dependente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dependente_delete', array('id' => $dependente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
