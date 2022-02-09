<?php


namespace App\Controller\Api\User;


use Symfony\Component\Routing\Annotation\Route;

class LoginController
{

    #[Route("/login_check", name: "login", methods: ["POST"])]
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}