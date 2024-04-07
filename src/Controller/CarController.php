<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/cars', name: 'app_cars')]
    public function index(): JsonResponse
    {
        return $this->json($this->entityManager->getRepository(Car::class)->findAll());
    }

    #[Route('/cars/{id}', name: 'app_car_by_id')]
    public function getbyID(int $id): JsonResponse
    {
        $car = $this->entityManager->getRepository(Car::class)->find($id);
        if ($car != null) {
            return $this->json($car);
        }
        return $this->json(['Error' => 'element not found'], 404);
    }
}
