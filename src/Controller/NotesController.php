<?php

namespace App\Controller;

use App\Entity\Matiers;
use App\Entity\Notes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/notes', name: 'notes_')]
class NotesController extends AbstractController
{
    #[Route('/', name: 'all')]
    public function index(EntityManagerInterface $emi): Response
    {
        $notes = $emi->getRepository(Notes::class)->findAll();
        $matiers = $emi->getRepository(Matiers::class)->findAll();
        return $this->render('notes/index.html.twig', [
            'notes' => $notes,
            'matiers' => $matiers,
        ]);
    }
}
