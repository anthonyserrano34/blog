<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\FormulaireAjoutType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     */



    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(FormulaireAjoutType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
        }

        return $this->renderForm('contact/index.html.twig',  [
            'controller_name' => 'Anthony',
            'form' => $form



        ]);


    }
}
