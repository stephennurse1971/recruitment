<?php

namespace App\Controller;

use App\Entity\Employer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployerLoginController extends AbstractController
{
    /**
     * @Route("/employer/login", name="employer_login")
     */
    public function index(Request $request): Response
    {
        if ($request->isMethod("POST"))
        {
            $email = $request->request->get('email');
            $password = $request->request->get("password");
            $repository = $this->getDoctrine()->getRepository(Employer::class);
            $getUser = $repository->findOneBy([
                'email' => $email,
                'password' => $password
            ]);
            if($getUser)
            {
                return $this->redirectToRoute('employer');
            }
        }
        return $this->render('employer/login.html.twig');
    }
}
