<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/message/{msg}', name: 'message_response')]
    public function message(string $msg): Response
    {
        return new JsonResponse(['Message' => $msg, 'Status' => 200]);
    }
}
