<?php

namespace App\Controller;

use App\Repository\CompteRepository;
use App\Repository\DepotRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DepotController extends AbstractController
{
    /**
     * 
     * @Route("/api/depot", name="depot")
     */
    public function depot(Request $request, CompteRepository $repoCompte, EntityManagerInterface $em)
    {
        
        $recup=json_decode($request->getContent());
        $recupCompte=$repoCompte->findOneById($recup->compte);
        $recupSoldeCompte= $repoCompte->findByCompte(05)->getSolde();
        $nouveauSolde= $recupSoldeCompte + $recup->montant;
        $recupCompte->setSolde($nouveauSolde);
       
       // $numeroCompte=random_int(111111111, 999999999);

        //var_dump($numeroCompte);   die;

        $em->persist($recupCompte);
        $em->flush();
      
        return new JsonResponse($recupCompte, 200); 
       
    }
}
