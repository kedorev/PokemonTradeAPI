<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $records = $em->getRepository("App:PokemonType")->findAll();
        dump($data);
    }
}
