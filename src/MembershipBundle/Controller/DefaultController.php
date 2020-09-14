<?php

namespace MembershipBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use MembershipBundle\Entity\Plan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{

    public function indexAction()
    {
        $plans=$this->getDoctrine()->getRepository(Plan::class)->findAll();
        return $this->render('@Membership/Default/index.html.twig',array('plans'=>$plans));
    }
    public function subscribeAction($id){
                $plan =  $this->getDoctrine()->getRepository(Plan::class)->find($id);
                $u = $this->getUser();
                $u->setPlan($plan);


                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($u);
                $entityManager->flush();
                return $this->redirectToRoute('ads_index');

    }
}
