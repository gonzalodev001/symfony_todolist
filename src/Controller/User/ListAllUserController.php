<?php


namespace App\Controller\User;


use App\User\Application\ListAllUsers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ListAllUserController
{
    public function __construct(private ListAllUsers $listAllUsers)
    {
    }
    #[Route('/list-users', name: 'user_list', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->listAllUsers->__invoke());
    }
}