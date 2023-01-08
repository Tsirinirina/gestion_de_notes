<?php

namespace App\Controller;

use App\Entity\Matiers;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $emi): Response
    {
        $matiers = $emi->getRepository(Matiers::class)->findAll();
        return $this->render('home/index.html.twig', [
            'titre' => 'titre',
            'matiers' => $matiers,
        ]);
    }
}
