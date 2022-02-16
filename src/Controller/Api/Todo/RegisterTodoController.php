<?php


namespace App\Controller\Api\Todo;


use App\Todo\Application\RegisterTodo;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class RegisterTodoController
{
    public function __construct(private RegisterTodo $registerTodo)
    {
    }

    #[Route('user/add-todo', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();

        $this->registerTodo->__invoke(
            $id,
            $data['title'],
            $data['details'],
            $data['date'],
            $data['state'],
            $data['userId']
        );
        return new JsonResponse('ok', Response::HTTP_OK);
    }

}