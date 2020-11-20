<?php

namespace App\Controller;

use App\Entity\Resort;
use App\Form\ResortType;
use App\Repository\ResortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resort")
 */
class ResortController extends AbstractController
{
    /**
     * @Route("/", name="resort_index", methods={"GET"})
     */
    public function index(ResortRepository $resortRepository): Response
    {
        return $this->render('admin/resort/index.html.twig', [
            'resorts' => $resortRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="resort_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resort = new Resort();
        $form = $this->createForm(ResortType::class, $resort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resort);
            $entityManager->flush();

            return $this->redirectToRoute('resort_index');
        }

        return $this->render('admin/resort/new.html.twig', [
            'resort' => $resort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resort_show", methods={"GET"})
     */
    public function show(Resort $resort): Response
    {
        return $this->render('resort/show.html.twig', [
            'resort' => $resort,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resort_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Resort $resort): Response
    {
        $form = $this->createForm(ResortType::class, $resort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resort_index');
        }

        return $this->render('resort/edit.html.twig', [
            'resort' => $resort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resort_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Resort $resort): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resort->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resort);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resort_index');
    }
}
