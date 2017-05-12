<?php

namespace UnaGauchada\UserBundle\Controller;

use UnaGauchada\UserBundle\Entity\Gaucho;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gaucho controller.
 *
 */
class GauchoController extends Controller
{
    /**
     * Lists all gaucho entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gauchos = $em->getRepository('UserBundle:Gaucho')->findAll();

        return $this->render('gaucho/index.html.twig', array(
            'gauchos' => $gauchos,
        ));
    }

    /**
     * Creates a new gaucho entity.
     *
     */
    public function newAction(Request $request)
    {
        $gaucho = new Gaucho();
        $form = $this->createForm('UnaGauchada\UserBundle\Form\GauchoType', $gaucho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gaucho);
            $em->flush();

            return $this->redirectToRoute('gaucho_show', array('id' => $gaucho->getId()));
        }

        return $this->render('gaucho/new.html.twig', array(
            'gaucho' => $gaucho,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gaucho entity.
     *
     */
    public function showAction(Gaucho $gaucho)
    {
        $deleteForm = $this->createDeleteForm($gaucho);

        return $this->render('gaucho/show.html.twig', array(
            'gaucho' => $gaucho,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gaucho entity.
     *
     */
    public function editAction(Request $request, Gaucho $gaucho)
    {
        $deleteForm = $this->createDeleteForm($gaucho);
        $editForm = $this->createForm('UnaGauchada\UserBundle\Form\GauchoType', $gaucho);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gaucho_edit', array('id' => $gaucho->getId()));
        }

        return $this->render('gaucho/edit.html.twig', array(
            'gaucho' => $gaucho,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gaucho entity.
     *
     */
    public function deleteAction(Request $request, Gaucho $gaucho)
    {
        $form = $this->createDeleteForm($gaucho);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gaucho);
            $em->flush();
        }

        return $this->redirectToRoute('gaucho_index');
    }

    /**
     * Creates a form to delete a gaucho entity.
     *
     * @param Gaucho $gaucho The gaucho entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gaucho $gaucho)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gaucho_delete', array('id' => $gaucho->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
