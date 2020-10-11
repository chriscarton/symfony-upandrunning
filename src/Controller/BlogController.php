<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
// use Doctrine\Common\Persistence\ObjectManager;
//use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    // /**
    //  * @Route("/", name="home")
    //  */
    // public function home(){
    //     return $this->render('blog/home.html.twig');
    // }

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    

    /**
     * @Route("/blog/{id}/edit", name="blog_form")
     * @Route("/blog/new", name="blog_form")
     */
    public function form(Article $article = null, Request $request, EntityManagerInterface $em){
        
        if(!$article){
            //Instanciation d'un nouvel article
            $article = new Article();
        }

        $form = $this->createFormBuilder($article)
            ->add('title')
            ->add('content')
            
            ->getForm()
        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        //Ajouter la date de création
            $article->setCreatedAt(new \DateTime());

            $em->persist($article);

            $em->flush();
            return $this->redirectToRoute('blog_show',[
                'id'=>$article->getId()
            ]);
    
        }

        return $this->render('blog/create.html.twig',[
            'formArticle'=>$form->createView(),
            //Dans la vue, interpreter de la façon suivante : {{ form(formArticle) }}
            'editMode'=>$article->getId() !== null
            //S'il n'y a pas d'id, on ajoute simplement
        ]);
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article){
        return $this->render('blog/show.html.twig',[
            article
        ]);
    }

    public function createNaive(Request $request, EntityManagerInterface $em)
    {
        if($request->isMethod('POST')){
            $data = $request->request->all;

            $pin = new Pin;
            $pin->setTitle($data['title']);
            $pin->setDescription($data['description']);
            $em->persist($pin);
            $em->flush();

            return $this->redirect('/');
        }
    }

}
