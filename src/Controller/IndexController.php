<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Books;
use Doctrine\DBAL\Driver\Connection;
use App\Repository\BooksRepository;





class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request,Connection $connection): Response
    {
        $book = new Books();        
        $form = $this->createForm(BooksType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $data = $form->getData();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($data);
             $entityManager->flush();
             return $this->redirectToRoute('index');
        }

        $data=[];

        if(isset($_GET['show'])){
           $data = $this->getDoctrine()->getRepository(Books::class)->findAll();          
        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
            'data'=>$data
        ]);

    }

    public function createTable(Connection $connection){
        // $em = $this->getDoctrine()->getManager();
        // $res=$em->getConnection->executeQuery("select * from books");
        dump("hello");
    }
}
