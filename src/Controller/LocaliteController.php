<?php

namespace App\Controller;

use App\Entity\Localite;
use App\Form\LocaliteType;
use App\Repository\LocaliteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocaliteController extends AbstractController
{
    #[Route('/localite', name: 'localite.index', methods:['GET'])]
    public function index(LocaliteRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $localites = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page',1,
            10)
        );
        return $this->render('pages/localite/index.html.twig', [
            'localites' => $localites,
        ]);
    }

    #[Route('/localite/nouveau', 'localite.new', methods: ['GET','POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ):Response
    {
        $localite = new Localite();
        $form = $this->createForm(LocaliteType::class, $localite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $localite = $form->getData();
            $manager->persist($localite);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre localité a été ajouté avec succès !'
            );
            return $this->redirectToRoute('localite.index');
        }
        return $this->render('pages/localite/new.html.twig', [
            'form' => $form->createView()
        ]);
       
    }

    #[Route('/localite/edition/{id}','localite.edit', methods: ['GET','POST'])]
    public function edit(
        Localite $localite,
        EntityManagerInterface $manager,
        Request $request
    ):Response
    {
        $form = $this->createForm(LocaliteType::class, $localite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $localite = $form->getData();
            $manager->persist($localite);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre localité a été modifié avec succès !'
            );
            return $this->redirectToRoute('localite.index');
        }
        return $this->render('pages/localite/edit.html.twig',[
            'form' => $form->createView()
    ]);
    }

    #[Route('/localite/suppression/{id}', 'localite.delete', methods: ['GET'])]
    public function delete(
    EntityManagerInterface $manager,
    Localite $localite
    ):Response
    {
        $manager->remove($localite);
        $manager->flush();

        $this->addFlash(
            'success',
            'Votre localité a été supprimé avec succès !'
        );

        return $this->redirectToRoute('localite.index');
    }
}
