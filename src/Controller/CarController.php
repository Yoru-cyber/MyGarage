<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    // private CarRepository $car_repository;
    // public function __construct(CarRepository $repository)
    // {
    //     $this->car_repository = $repository;
    // }

    #[Route('/cars', name: 'app_cars')]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        return $this->json($entityManager->getRepository(Car::class)->findAll());
    }

    #[Route('/cars/{id}', name: 'app_car_by_id')]
    public function getbyID(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $car = $entityManager->getRepository(Car::class)->find($id);
        if ($car != null) {
            return $this->json($car);
        }
        return $this->json(['Error' => 'element not found'], 404);
    }
}
