<?php

namespace App\Controller;

use App\Entity\Agent;
use App\Form\AgentType;
use App\Repository\AgentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AgentController extends AbstractController
{
    #[Route('/agent', name: 'agent.index', methods: 'GET')]
    public function index(AgentRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        $agents = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('pages/agent/index.html.twig', [
            'agents' => $agents
        ]);
    }

    #[Route('/agent/nouveau', 'agent.new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $agent = new Agent();
        $form = $this->createForm(AgentType::class, $agent);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $agent = $form->getData();
            $manager->persist($agent);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre agent a été ajouté avec succès !'
            );
            return $this->redirectToRoute('agent.index');
        }
        return $this->render('pages/agent/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/agent/edition/{id}', 'agent.edit', methods: ['GET', 'POST'])]
    public function edit(
        Agent $agent,
        Request $request,
        EntityManagerInterface $manager
    ): Response {

        $form = $this->createForm(AgentType::class, $agent);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $agent = $form->getData();
            $manager->persist($agent);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre agent a été modifié avec succès !'
            );
            return $this->redirectToRoute('agent.index');
        }



        return $this->render('pages/agent/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
