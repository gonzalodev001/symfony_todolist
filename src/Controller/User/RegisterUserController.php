<?php


namespace App\Controller\User;


use App\User\Application\RegisterUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterUserController
{

    public function __construct(private RegisterUser $registerUser)
    {
    }
    #[Route('/create-user/', name: 'user_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $this->registerUser->__invoke(
            $id,
            $request->request->get('name'),
            $request->request->get('email'),
            $request->request->get('password'),
            $request->request->get('confirmPassword')
        );
        return new JsonResponse('ok', Response::HTTP_OK);
    }
}