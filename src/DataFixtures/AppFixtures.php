<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i=0; $i < 10; $i++) { 
            $client=new Client();
            $client->setName("client ".$i);
            $client->setEmail("Email ".$i);
            $client->setTele("Tele ".$i);
            $client->setVille("Ville ".$i);
            $client->setPassword("Admin ".$i);
            $client->setUsername("Usename ".$i);
            $manager->persist($client);
        }
        $manager->flush();
    }
}
