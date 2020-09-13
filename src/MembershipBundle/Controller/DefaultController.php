<?php

namespace MembershipBundle\Controller;

use MembershipBundle\Entity\Plan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{

    public function indexAction()
    {
        $plans=$this->getDoctrine()->getRepository(Plan::class)->findAll();
        return $this->render('@Membership/Default/index.html.twig',array('plans'=>$plans));
    }
    public function subscribeAction(Request $request,$id){
        if($request->isXmlHttpRequest()){
                $plan =  $this->getDoctrine()->getRepository(Plan::class)->find($id);
                $this->getDoctrine()->getRepository(User::class)->subscribeToPlan($plan);
                echo $id;
                die();
                return new Response(
                    $plan,
                    Response::HTTP_OK
                );

        }

        return new Response(
            $id,
            Response::HTTP_OK
        );
    }
}
