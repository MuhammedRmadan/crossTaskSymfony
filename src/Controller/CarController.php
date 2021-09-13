<?php
// src/Controller/CarController.php
namespace App\Controller;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CarController extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }


    public function getCars()
    {
        // from inside a controller
        $repository = $this->getDoctrine()->getRepository(Car::class);

        $cars = $repository->getAll();


        $response = new Response(json_encode(array('success'=>true,'data' => json_decode(json_encode($cars), true))));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}