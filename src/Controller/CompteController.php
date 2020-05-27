<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function numeroCompte()
    {
        
        $numeroCompte=random_int(111111111, 999999999);

        var_dump($numeroCompte);

       
    }
}
