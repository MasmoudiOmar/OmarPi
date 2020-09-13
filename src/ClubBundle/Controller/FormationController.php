<?php
namespace ClubBundle\Controller;

use ClubBundle\Entity\Formation;
use ClubBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ClubBundle\Form\FormationType;

class FormationController extends Controller{

    public function readFAction()
    {   //fetching Objects (formations) from the DataBase
        $formations=$this->getDoctrine()->getRepository(Formation::class)->findAll();
        return $this->render('@Club/Formation/readAll_Formation.html.twig',array('formations'=>$formations));
    }

    public function createFAction(Request $request)
    {
        $formation=new Formation();
        $form=$this->createForm(FormationType::class,$formation);
        $form=$form->handleRequest($request);
        if ($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
            return $this->redirectToRoute('formation_readAll');
        }

        return $this->render('@Club/Formation/createF.html.twig',array('form'=>$form->createView()));
    }

    public function rechercheFAction(Request $request)
    {
        $formation=new Formation();
        $form=$this->createForm(RechercheType::class,$formation);
        $form=$form->handleRequest($request);
        if($form->isSubmitted()){
            $formations=$this->getDoctrine()
                            ->getRepository(Formation::class)
                            ->findBy(array('Titre'=>$formation->getTitre()));
        }
        else{
            $formations=$this->getDoctrine()->getRepository(Formation::class)->findAll();
        }

        return $this->render("@Club/Formation/recherche.html.twig",array('f'=>$form->createView(),'form'=>$formations));
    }
}
