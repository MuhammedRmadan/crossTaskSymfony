<?php
// src/Controller/CarController.php
namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends APIController
{

    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }


    public function getCars(Request $request)
    {
        //get current locale
        $locale = $request->getLocale();

        // from inside a controller
        $repository = $this->getDoctrine()->getRepository(Car::class);

        $cars = $repository->getAll();


        $response = new Response(json_encode(array('success' => true, 'data' => $this->json($cars))));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function index(Request $request, PaginatorInterface $paginator)
    {
        //retreive teh entity manager of Doctrine
        $em = $this->getDoctrine()->getManager();

        //get limit
        $limit = $request->get('limit');

        //get the repositry of data
        $carRepository = $em->getRepository(Car::class);

        //find data and filter query
        $carQuery = $carRepository->createQueryBuilder('c')
            ->where('c.model LIKE :search')
            ->orWhere('c.brand LIKE :search')
            ->orWhere('c.color LIKE :search')
            ->orWhere('c.gas_economy LIKE :search')
            ->setParameter('search', '%' . $request->get('search') . '%')
            ->getQuery();

        //paginate the results of the query
        $cars = $paginator->paginate(
        //doctrine query not results
            $carQuery,
            //define the page parameter
            $request->query->getInt('page', 1),
            //items perpage
            $limit
        );

        return ($this->json($cars));
    }
}