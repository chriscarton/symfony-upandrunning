<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/inscription", name="app_register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder){
        
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //... ?
            $user = new User();

            $data = $form->getData();

            $password = $form->get('password')->getData();

            $encoded_password = $passwordEncoder->encodePassword(
                $user,
                $password
            );

            //Bon ça c'est pas bon...
            //$user->setFirstName($form->get('first_name'));
            //$user->setLastName($form->get('last_name'));
            //$user->setEmail($form->get('email'));
            $data->setRoles(['ROLE_USER']);
            $data->setPassword($encoded_password);
            
            $data->setVerified(0);
            $data->setSecurityKey(uniqid());

            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('register_success');
        }
        
        return $this->render('security/register.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/inscription-reussie", name="register_success")
     */
    public function register_success(){
        return $this->render('security/register_success.html.twig');
    }


    
    /**
     * @Route("/verification/{uniqid}", name="register_checkout")
     */
    public function register_checkout(string $uniqid, UserRepository $repo, EntityManagerInterface $em){

        $user = $repo->findOneBy(['security_key'=>$uniqid]);

        $status = false;
        
        if($user){
            $user->setVerified(1);
            $em->persist($user);
            $em->flush();
            $status = true;
        }

        return $this->render('security/register_checkout.html.twig',[
            'status'=>$status
        ]);


    }

}
