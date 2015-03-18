<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


use BlogBundle\Entity\Blog;
use BlogBundle\Entity\Hozzaszolasok;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$blog_bejegyzesek = $this->getDoctrine()->getRepository('BlogBundle:Blog')->findBy(array(),array('keszites_idopontja' => 'DESC'));;
        return $this->render('BlogBundle:Default:blog_list.html.twig',array("blog_bejegyzesek"=>$blog_bejegyzesek));
    }
    public function detailAction($id,Request $request)
    {
        $session = new Session();
    	$blog = $this->getDoctrine()->getRepository('BlogBundle:Blog')->find($id);

//echo "<pre>";
//print_r($blog);exit; 
        $hozzaszolas = new Hozzaszolasok();
        $hozzaszolas->setBlog($this->getDoctrine()->getRepository('BlogBundle:Blog')->find($id));
        $hozzaszolas->setKeszitesIdopontja(new \DateTime("now"));
        $form = $this->createFormBuilder($hozzaszolas)
            ->add('nev', 'text', array('label'=>'Neved',))
            ->add('hozzaszolas', 'textarea', array('label'=>'Hozzászólás',"required"=>true))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hozzaszolas);
            
            $em->flush();

            $session->getFlashBag()->add('notice', 'Hozzászólásodat mentettük!');
            return $this->redirect($this->generateUrl('blog_detail',array("id"=>$id)));
        }  

        return $this->render('BlogBundle:Default:blog_detail.html.twig',array(
            "blog"=>$blog,
            "form"=>$form->createView()
        ));
    }
    public function uj_blogAction(Request $request){
        $session = new Session();
        $blog = new Blog();
        $blog->setKeszitesIdopontja(new \DateTime("now"));
        $form = $this->createFormBuilder($blog)
            ->add('szerzo', 'text', array('label'=>'Szerző',"required"=>true))
            ->add('cim', 'textarea', array('label'=>'Cím',"required"=>true))
            ->add('bevezeto', 'textarea', array('label'=>'Bevezető',"required"=>true))
            ->add('bejegyzes', 'textarea', array('label'=>'Bejegyzés',"required"=>true))
            ->getForm();      

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blog);
            
            $em->flush();

            $session->getFlashBag()->add('notice', 'Új begyzést mentettük!');
            return $this->redirect($this->generateUrl('blog_homepage'));
        }  

        return $this->render('BlogBundle:Default:uj_blog.html.twig',array(
            "blog"=>$blog,
            "form"=>$form->createView()
        ));
    }
}

  