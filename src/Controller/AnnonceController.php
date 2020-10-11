<?php

namespace App\Controller;

use Exception;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/", name="annonce")
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(Annonce::class);

        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'items'=>$repo->findAll()
        ]);
    }

    /**
     * @Route("/ajouter-une-annonce", name="annonce_add")
     */
    public function add(Request $request, EntityManagerInterface $em){

        $form = $this->createForm(AnnonceType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $data->setUpdatedAt(new \Datetime());
            
            if(empty($data->createdAt)){
                $data->setCreatedAt(new \Datetime());
            }
            
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('annonce');
        }

        return $this->render('annonce/add.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/annonce-{id}", name="annonce_show")
     */

    public function show(Annonce $item, AnnonceRepository $repo){

        return $this->render('annonce/show.html.twig',[
            'item'=>$item
        ]);
    }

}
