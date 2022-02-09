<?php


namespace App\Controller\Api\User;


use App\User\Application\ListAllUsers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ListAllUserController extends AbstractController
{
    public function __construct(private ListAllUsers $listAllUsers)
    {
    }
    #[Route('/list-users', name: 'user_list', methods: ['GET'])]
    public function allUsers(): JsonResponse
    {
        return $this->json($this->listAllUsers->__invoke());

    }

}