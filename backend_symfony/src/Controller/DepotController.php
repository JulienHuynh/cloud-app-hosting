<?php

namespace App\Controller;

use App\Entity\Depot;
use App\Repository\DepotRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DepotController extends AbstractController
{
    #[Route('/new-repository', name: 'app_new_repository', methods: "GET")]
    public function newRepositoryRender(): Response
    {
        return $this->render('pages/new-repository.html.twig');
    }

    #[Route('/new-repository', name: 'new_repository', methods: "POST")]
    public function addNewRepository(DepotRepository $depotRepository, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $repositoryFiles = $request->get('files');
        $repositoryName = strtolower($request->get('repositoryName'));

        $repositoryName = str_replace(' ', '-', $repositoryName);;
        $username = $this->getUser()->getUsername();
        $repositoryPath = '/home/' . $username . '/repositories/' . $repositoryName;

        $newRepository = (new Depot())
            ->setName($repositoryName)
            ->setDirectory($repositoryPath)
            ->setUser($this->getUser());

        shell_exec("../../scripts/create_new_repository.sh  '$repositoryPath' '$repositoryName' '$username' '$repositoryFiles'");

        $entityManager->persist($newRepository);
        $entityManager->flush();

        return $this->json([
            'message' => 'Le dépôt a bien été créé !',
            'repository' => $newRepository
        ]);
    }

    #[Route('/user-repositories', name: 'app_user_repositories', methods: "GET")]
    public function getUserRepositories(DepotRepository $depotRepository): Response
    {
        $userRepositories = $depotRepository->findBy(['user' => $this->getUser()]);

        return $this->render('pages/userRepositories.html.twig', [
            'repositories' => $userRepositories
        ]);
    }

}
