<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CalculationController extends AbstractController {
    #[Route ("/calc", name: "calc2")]
    public function calculation (Request $request) : Response {
        $number1 = $request->query->get("number1");
        $number2 = $request->query->get("number2");
        $operator = $request->query->get("operation");
        $calc = [];

        if ($operator == "+") {
            $calc = [
                "addition" => $number1 + $number2
            ];
        }

        else if ($operator == "-") {
            $calc = [
                "subtraction" => $number1 - $number2
            ];
        }

        else if ($operator == "*") {
            $calc = [
                "multiplication" => $number1 * $number2
            ];
        }
        if ($operator == "/") {
            if ($number2 == 0) {
                $calc = [
                    "division" =>"Cannot divide by zero."
                ];
            }
            else {
                $calc = [
                    "division" => $number1 / $number2
                ];
            }
        }
/*         if (is_numeric($number1) && is_numeric($number2)) { // this condition no longer needed, changed input type to number 
            if ($number2 != 0) {
            $calc = [
        "addition" => $number1 + $number2,
        "subtraction" => $number1 - $number2,
        "multiplication" => $number1 * $number2,
        "division" => $number1 / $number2
            ];
        } else  { 
            $calc = [
            "addition" => $number1 + $number2,
            "subtraction" => $number1 - $number2,
            "multiplication" => $number1 * $number2,
            "division" => "Cannot divide by zero."
        ];
    }
        } else {
            echo "Please give two numbers.";
        } */
    return $this->render("calculator/index.html.twig",[ 
        "calculations" => $calc,
        "number1" => $number1,
        "number2" => $number2,
        "operator" => $operator]
    );
}}
