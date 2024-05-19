<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Book;
use App\Form\BookFormType;
use App\Repository\BookRepository;

class BookSiteController extends AbstractController
{
    #[Route("/", name: "booksite", methods: ["GET"])]
    public function showBooks(BookRepository $bookRepository): Response
    {
        return $this->render(
            "booksite/index.html.twig", [
                "books" => $bookRepository->findAll(),
            ]);
    }
    #[Route("/create", name:"create_book", methods: ["GET", "POST"])]
    public function createBook(Request $request, ManagerRegistry $doctrine) : Response
    {
        $title = $request->get("title");
        $author = $request->get("author");

        $book = new Book();
        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        
        {
            $em = $doctrine->getManager();
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute("booksite");
        }
       
        return $this->render("booksite/create.html.twig", [
            "book" => $book,
            "form" => $form->createView(),
        ]
        );
    }
    #[Route('/update/{id}', name: 'update_book', methods: ["GET", "POST"])]
    public function updateBook(ManagerRegistry $doctrine, Book $book, Request $request)
    {
        
       $form = $this->createForm(BookFormType::class, $book);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
        $em = $doctrine->getManager();
        $em->persist($book);
        $em->flush();

        return $this->redirectToRoute("booksite");
       }

       return $this->render("booksite/update.html.twig", [
        "book" => $book,
        "form" => $form->createView(),
    ]);
}
    

    #[Route('/delete/{id}', name: 'delete_book', methods: ["GET"])]
    public function deleteBook($id, ManagerRegistry $doctrine, Book $book)
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute("booksite");
    }
}

