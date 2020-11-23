<?php

namespace App\Controller;

use App\Entity\Employer;
use App\Form\EmployerType;
use App\Repository\EmployerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employer")
 */
class EmployerController extends AbstractController
{
    /**
     * @Route("/", name="employer_index", methods={"GET"})
     */
    public function index(EmployerRepository $employerRepository): Response
    {
        return $this->render('employer/index.html.twig', [
            'employers' => $employerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="employer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $employer = new Employer();
        $form = $this->createForm(EmployerType::class, $employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employer);
            $entityManager->flush();

            return $this->redirectToRoute('employer_index');
        }

        return $this->render('employer/new.html.twig', [
            'employer' => $employer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="employer_show", methods={"GET"})
     */
    public function show(Employer $employer): Response
    {
        return $this->render('employer/show.html.twig', [
            'employer' => $employer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="employer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Employer $employer): Response
    {
        $form = $this->createForm(EmployerType::class, $employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employer_index');
        }

        return $this->render('employer/edit.html.twig', [
            'employer' => $employer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="employer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Employer $employer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($employer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employer_index');
    }
}
