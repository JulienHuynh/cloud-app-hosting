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
        shell_exec("../../scripts/create_new_mysqldump.sh root 1234 test ");
        shell_exec("../../scripts/create_new_espacedisk.sh");
        $diskSpace = file_get_contents("../../scripts/backup/diskspace");
        $backupMysql = "../../scripts/backup/backupmysql";
        $backupMysqlSize = filesize($backupMysql) /1024/1024;
        return $this->json([
            'Mysql usedSpace' => $backupMysqlSize + ' MB',
            'diskSpace'       => $diskSpace,
        ]);

    }
}
