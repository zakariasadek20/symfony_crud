<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function clients()
    {
        $repository=$this->getDoctrine()->getRepository(Client::class);
        $clients=$repository->findAll();
        return $this->json([
            "data"=>array_map(function(Client $client){
                    return [
                        "name"=>$client->getName(),
                        "email"=>$client->getEmail(),
                        "tele"=>$client->getTele(),
                        "ville"=>$client->getVille(),
                        "password"=>$client->getPassword(),
                        "username"=>$client->getUsername()
                    ];
                },$clients)
        ]);
    }
}
