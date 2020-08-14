<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * @Route("/User/Test")
     */
    public function getUserTest()
    {
        $user = new User();
        dump($user);

    }
}