<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CalculatorController extends AbstractController {
    #[Route ("/", name: "calc")]
    public function calculator (Request $request): Response {
    $number1 = $request->query->get("number1", "");
    $number2 = $request->query->get("number2", "");
    $calculations = [];
    if ($number1 && $number2) {
  /*   if ($number2 == 0) {
        echo "Cannot divide by zero."; */
        if (is_numeric($number1) && is_numeric($number2) && $number2 != 0) {
            $calculations = [
            "addition " . $number1 . "+" . $number2  => $number1 + $number2,
            "subtraction ". $number1 . "-" . $number2 => $number1 - $number2,
            "multiplication ". $number1 . "*" . $number2 => $number1 * $number2,
            "division ". $number1 . "/" . $number2 => $number1 / $number2,
       ];
    } } 
    else  {
        echo "Please enter two numbers.";
    }
    return $this->render("calculator/index.html.twig",[ 
        "calculations" => $calculations,
        "number1" => $number1,
        "number2" => $number2]
    );
}
}
        
    
        /* else {
            echo "Fields cannot be empty.";
        } */

    
         
    
       
     
   
    
