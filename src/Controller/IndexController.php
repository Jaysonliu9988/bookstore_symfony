<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $book = new Books();        
        $form = $this->createForm(BooksType::class, $book);

        return $this->render('index/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
