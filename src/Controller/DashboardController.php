<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Company;
use App\Entity\Clients;
use App\Repository\CompanyRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        
        $companies = $em->getRepository(Company::class);

        $totalCompanies = $companies->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $clients = $em->getRepository(Clients::class);

        $totalClients = $clients->createQueryBuilder('cl')
            ->select('count(cl.id)')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'companies_total' => $totalCompanies,
            'clients_total' => $totalClients,
            'users_total' => 5
        ]);
    }
}
