<?php

namespace App\Controller;
use App\Repository\Bdd2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class bddSizeController extends AbstractController
{
    #[Route('/bdd-size', name: 'bdd-size')]
    public function bddSize(Bdd2Repository $BddRepository): JsonResponse
    {
        shell_exec("../../scripts/create_new_mysqldump.sh  '$repositoryPath' '$repositoryName' '$usern' '$password' '$bddname'");
        $filename = $repositoryPath+'/'+$repositoryName+'.txt';
        $filesize = filesize($filename) /1024/1024;
        return $this->json([
            'tags' => $filesize + ' MB'
        ]);

    }
}
