<?php

namespace UnaGauchada\FavoresBundle\Controller;

use UnaGauchada\FavoresBundle\Entity\Favor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Favor controller.
 *
 */
class FavorController extends Controller
{
    /**
     * Lists all favor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $favors = $em->getRepository('FavoresBundle:Favor')->findAll();

        return $this->render('favor/index.html.twig', array(
            'favors' => $favors,
        ));
    }

    /**
     * Creates a new favor entity.
     *
     */
    public function newAction(Request $request)
    {
        $favor = new Favor();
        $form = $this->createForm('UnaGauchada\FavoresBundle\Form\FavorType', $favor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($favor);
            $em->flush();

            return $this->redirectToRoute('favor_show', array('id' => $favor->getId()));
        }

        return $this->render('favor/new.html.twig', array(
            'favor' => $favor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a favor entity.
     *
     */
    public function showAction(Favor $favor)
    {
        $deleteForm = $this->createDeleteForm($favor);

        return $this->render('favor/show.html.twig', array(
            'favor' => $favor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing favor entity.
     *
     */
    public function editAction(Request $request, Favor $favor)
    {
        $deleteForm = $this->createDeleteForm($favor);
        $editForm = $this->createForm('UnaGauchada\FavoresBundle\Form\FavorType', $favor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favor_edit', array('id' => $favor->getId()));
        }

        return $this->render('favor/edit.html.twig', array(
            'favor' => $favor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a favor entity.
     *
     */
    public function deleteAction(Request $request, Favor $favor)
    {
        $form = $this->createDeleteForm($favor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favor);
            $em->flush();
        }

        return $this->redirectToRoute('favor_index');
    }

    /**
     * Creates a form to delete a favor entity.
     *
     * @param Favor $favor The favor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Favor $favor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('favor_delete', array('id' => $favor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
