<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HealthCheckController
{

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse('TodoList ok', Response::HTTP_OK);
    }

}