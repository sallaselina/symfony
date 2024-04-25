<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HelloWorldController extends AbstractController {

    #[Route ("/", name: "hello_symfony", methods: ["GET"])]
    public function helloWorld () {
        return new Response("Pink Floyd --- Another Brick In the wall");
    }
}
