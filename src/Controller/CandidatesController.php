<?php

namespace App\Controller;

use App\Entity\Candidates;
use App\Form\CandidatesType;
use App\Repository\CandidatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidates")
 */
class CandidatesController extends AbstractController
{
    /**
     * @Route("/", name="candidates_index", methods={"GET"})
     */
    public function index(CandidatesRepository $candidatesRepository): Response
    {
        return $this->render('candidates/index.html.twig', [
            'candidates' => $candidatesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="candidates_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidate = new Candidates();
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('candidates_index');
        }

        return $this->render('candidates/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidates_show", methods={"GET"})
     */
    public function show(Candidates $candidate): Response
    {
        return $this->render('candidates/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidates_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidates $candidate): Response
    {
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidates_index');
        }

        return $this->render('candidates/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidates_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Candidates $candidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidates_index');
    }
}
