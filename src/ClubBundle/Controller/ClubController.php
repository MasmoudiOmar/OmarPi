<?php

namespace ClubBundle\Controller;


use ClubBundle\ClubBundle;
use ClubBundle\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ClubBundle\Form\ClubType;

class ClubController extends Controller
{
    public function AfficheAction()
    {
        $classe='4infob2';
        return new Response("Good luck! ".$classe.".");
    }

    public function HomeAction()
    {
        return $this->render('@Club/Club/homePage.html.twig');
    }

    public function ReadAction($nom)
    {
        return $this->render('@Club/Club/details.html.twig',array('n'=>$nom));
    }


    public function ListAction()
    {
        $formations=array();
        $formations[0]=array('ref'=>'f147','titre'=>'Formation Symfony 3.4','description'=>'formation pratique','dateDebut'=>'12/06/2019','dateFin'=>'19/06/2019','nbPratiquants'=>'19');
        $formations[1]=array('ref'=>'f148','titre'=>'Formation GDBC','description'=>'formation pratique','dateDebut'=>'27/06/2019','dateFin'=>'6/07/2019','nbPratiquants'=>'21');
        $formations[2]=array('ref'=>'f149','titre'=>'Formation java','description'=>'formation pratique','dateDebut'=>'20/06/2019','dateFin'=>'26/06/2019','nbPratiquants'=>'20');
        return $this->render('@Club/Club/list.html.twig',array('tab'=>$formations));
    }

    public function showFormationAction($ref)
    {
        return $this->render('@Club/Club/detail.html.twig',array('ref'=>$ref));
    }


    public function readAllAction()
    {   //fetching Objects (clubs) from the DataBase
        $clubs=$this->getDoctrine()->getRepository(Club::class)->findAll();
        return $this->render('@Club/Club/readAll.html.twig',array('clubs'=>$clubs));
    }

    public function deleteAction($id)
    {
       $em= $this->getDoctrine()->getManager();
           $club=$em->getRepository(Club::class)->find($id);
       $em->remove( $club);
           $em->flush();
        return $this->redirectToRoute("club_readAll");
    }

    public function createAction(Request $request)
    {
        $club=new Club();
            $form=$this->createForm(ClubType::class,$club);
            $form=$form->handleRequest($request);
            if ($form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($club);
                $em->flush();
                return $this->redirectToRoute('club_readAll');
            }

            return $this->render('@Club/Club/create.html.twig',array('form'=>$form->createView()));
    }

    public function updateAction($id ,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Club::class)->find($id);
        $form=$this->createForm(ClubType::class,$club);
        $form=$form->handleRequest($request);
        if ($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();
            return $this->redirectToRoute('club_readAll');
        }

        return $this->render('@Club/Club/update.html.twig',array('form'=>$form->createView()));
    }
}
    

