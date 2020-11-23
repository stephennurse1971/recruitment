<?php

namespace App\Controller;

use App\Entity\Employer;
use App\Form\EmployerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmployerRegistrationController extends AbstractController
{
    /**
     * @Route("/employer/registration", name="employer_registration")
     */
    public function index(Request $request)
    {
        $employer = new Employer();
        $form =$this->createForm(EmployerType::class, $employer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employer);
            $entityManager->flush();
            return $this->redirectToRoute('employer_login');
        }

        return $this->render('Employer/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
