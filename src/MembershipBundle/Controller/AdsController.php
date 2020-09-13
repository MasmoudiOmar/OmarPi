<?php

namespace MembershipBundle\Controller;

use MembershipBundle\Entity\Ads;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ad controller.
 *
 */
class AdsController extends Controller
{
    /**
     * Lists all ad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ads = $em->getRepository('MembershipBundle:Ads')->findAll();

        return $this->render('ads/index.html.twig', array(
            'ads' => $ads,
        ));
    }

    /**
     * Creates a new ad entity.
     *
     */
    public function newAction(Request $request)
    {
        $ad = new Ad();
        $form = $this->createForm('MembershipBundle\Form\AdsType', $ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();

            return $this->redirectToRoute('ads_show', array('id' => $ad->getId()));
        }

        return $this->render('ads/new.html.twig', array(
            'ad' => $ad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ad entity.
     *
     */
    public function showAction(Ads $ad)
    {
        $deleteForm = $this->createDeleteForm($ad);

        return $this->render('ads/show.html.twig', array(
            'ad' => $ad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ad entity.
     *
     */
    public function editAction(Request $request, Ads $ad)
    {
        $deleteForm = $this->createDeleteForm($ad);
        $editForm = $this->createForm('MembershipBundle\Form\AdsType', $ad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ads_edit', array('id' => $ad->getId()));
        }

        return $this->render('ads/edit.html.twig', array(
            'ad' => $ad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ad entity.
     *
     */
    public function deleteAction(Request $request, Ads $ad)
    {
        $form = $this->createDeleteForm($ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ad);
            $em->flush();
        }

        return $this->redirectToRoute('ads_index');
    }

    /**
     * Creates a form to delete a ad entity.
     *
     * @param Ads $ad The ad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ads $ad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ads_delete', array('id' => $ad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
