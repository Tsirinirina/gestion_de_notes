<?php

namespace App\Controller;

use App\Entity\Eleves;
use App\Form\ElevesType;
use App\Repository\ElevesRepository;
use App\Repository\MatiersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/eleves', name: 'eleve_')]
class EleveController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ElevesRepository $elevesRepository, MatiersRepository $matiersRepository): Response
    {

        return $this->render('eleve/index.html.twig', [
            'eleves' => $elevesRepository->findAll(),
            'matiers' => $matiersRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'ajouter', methods: ['GET', 'POST'])]
    public function new(Request $request, ElevesRepository $elevesRepository, MatiersRepository $matiersRepository): Response
    {
        $elefe = new Eleves();
        $form = $this->createForm(ElevesType::class, $elefe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $elevesRepository->save($elefe, true);

            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eleve/ajouter.html.twig', [
            'elefe' => $elefe,
            'form' => $form,
            'matiers' => $matiersRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'voir', methods: ['GET'])]
    public function show(Eleves $elefe, MatiersRepository $matiersRepository): Response
    {
        return $this->render('eleve/voir.html.twig', [
            'elefe' => $elefe,
            'matiers' => $matiersRepository->findAll(),
        ]);
    }

    #[Route('/{id}/modifier', name: 'modifier', methods: ['GET', 'POST'])]
    public function edit(Request $request, Eleves $elefe, ElevesRepository $elevesRepository, MatiersRepository $matiersRepository): Response
    {
        $form = $this->createForm(ElevesType::class, $elefe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $elevesRepository->save($elefe, true);

            return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eleve/modifier.html.twig', [
            'elefe' => $elefe,
            'form' => $form,
            'matiers' => $matiersRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'supprimer', methods: ['POST'])]
    public function delete(Request $request, Eleves $elefe, ElevesRepository $elevesRepository, MatiersRepository $matiersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $elefe->getId(), $request->request->get('_token'))) {
            $elevesRepository->remove($elefe, true);
        }

        return $this->redirectToRoute('eleve_index', [], Response::HTTP_SEE_OTHER);
    }
}
