<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TemperatureController extends AbstractController {
    #[Route ("/temp", name: "temp")]
    public function temperatureConversion(Request $request) {
        $temp = $request->query->get("temp");
        if (!is_numeric($temp)) {
            return new Response("ERROR: temperature must be a number", 400);
        } else {
        $fahrenheit = ($temp * 9 / 5) + 32;
        $celcius = ($temp - 32) / 1.8;
        return new Response($temp . " Celcius in Fahrenheit : " . $fahrenheit . "<br>" . $temp . " Fahrenheit in Celcius: " . $celcius);
        }
    }
}