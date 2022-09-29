<?php

namespace App\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class OptionGenerator
{
    public function getAllAsArray(ServiceEntityRepository $repo): array
    {
        $options = $repo->getAllAsArray();
        
        return $options;
    }
}