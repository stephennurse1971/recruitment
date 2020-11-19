<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployerController extends AbstractController
{
    /**
     * @Route("/employer", name="employer")
     */
    public function index(): Response
    {
        return $this->render('employer/test.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
}
