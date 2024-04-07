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

    #[Route('/cars', name: 'app_car')]
    public function index(EntityManagerInterface $entityManager): JsonResponse
    {
        return $this->json($entityManager->getRepository(Car::class)->findAll());
    }
}
