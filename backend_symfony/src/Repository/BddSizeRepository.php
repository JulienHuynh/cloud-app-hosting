<?php

namespace AppBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DoctrineDatabaseSizeCommand
 *
 * Get database size in MB.
 * It works with MySQL only.
 *
 * LICENSE: MIT
 *
 * @package    AppBundle\Command
 * @author     Lelle - Daniele Rostellato <lelle.daniele@gmail.com>
 * @license    MIT
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */
class BddSizeRepository extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('doctrine:database:size')
            ->setDescription('Get database size in MB. MySQL only.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');
        $databaseName = $container->getParameter('database_name');
        /** @var EntityManager $em */
        $em = $doctrine->getManager();
        $query = "SELECT
                    SUM(data_length + index_length)/1024/1024 AS size
                  FROM information_schema.TABLES 
                  WHERE table_schema='$databaseName' 
                  GROUP BY table_schema";
        $stmt = $em->getConnection()
            ->prepare($query);
        $stmt->execute();
        $size = $stmt->fetchAll();

        if(is_array($size) && isset($size[0]['size']))
        {
            $row = "The database size is {$size[0]['size']} MB";
        } else
        {
            $row = 'Undefined';
        }

        $output->write($row, true);
    }
}