<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class PalindromeController extends AbstractController {
    #[Route("/palindrome", name: "palindrome")]
    public function checkPalindrome(Request $request): Response {
        $input = $request->query->get("pal", "");
        if ($input) {
            if (strrev($input) === $input) {
                echo $input . " is a palindrome.";
        } else {
            echo $input . " is not a palindrome.";
        }
    }
    return $this->render("palindrome/index.html.twig");
}
}