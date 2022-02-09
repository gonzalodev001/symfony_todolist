<?php


namespace App\Controller\Api\User;


use App\User\Application\AddRoleToUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddRolToUserController
{
    public function __construct(private AddRoleToUser $addRoleToUser)
    {
    }

    #[Route('user/addrole', methods:['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();
  
        $this->addRoleToUser->__invoke(
            $data['id'],
            $data['role']
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }

}