<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AEmployerController extends AbstractController
{
    /**
     * @Route("a/employer", name="employer")
     */
    public function index(): Response
    {
        return $this->render('employer/test.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
}
