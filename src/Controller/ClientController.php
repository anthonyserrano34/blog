<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    private  $contactRepository;


    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Route("client/{ContactName}", name="client")
     */
    public  function contactName(int  $ContactName): Response
    {
        return $this->render('client/index.html.twig', [

            'ContactName' => $ContactName,
            'contacts' => $this->contactRepository->findAll(),
            'contact' => $this->contactRepository->find($ContactName)

        ]);
    }
}
