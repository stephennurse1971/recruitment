<?php

namespace App\Controller;

use App\Entity\Employer;
use App\Entity\User;
use App\Form\EmployerType;
use App\Repository\EmployerRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/register", name="employer_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // $employer = new Employer();
        $user = new User();

        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            // get post request values
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            // set user
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $password
                )
            );
            $user->setEmail($email);
            $roles = ['ROLE_EMPLOYER'];
            $user->setRoles($roles);

            // save user
            $entityManager->persist($user);
            $entityManager->flush();

            // Save employer
            if ($user) {
                $this->register($request, $entityManager, $user);

                //redirect to login route after succesfull registration
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('employer/new.html.twig');
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

    public function register(Request $request, EntityManager $entityManager, User $user)
    {
        $employer = new Employer();
        // $entityManager = $this->entityManager;
        // $request = $this->request;
        // $user = $this->user;
        // get all post values
        $contactName = $request->request->get('contact_name');
        $companyName = $request->request->get('company_name');
        $address1 = $request->request->get('address1');
        $address2 = $request->request->get('address2');
        $telephone = $request->request->get('telephone');

        //set employer
        $employer->setContactName($contactName);
        $employer->setCompanyName($companyName);
        $employer->setAddress1($address1);
        $employer->setAddress2($address2);
        $employer->setTelephone($telephone);

        //save employer
        $employer->setUser($user);
        $entityManager->persist($employer);
        $entityManager->flush();

        return null;
    }
}