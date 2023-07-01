<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Project;
use App\Entity\Vico;
use App\Factory\ClientFactory;
use App\Factory\ProjectFactory;
use App\Factory\RatingFactory;
use App\Factory\VicoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $faker =  Faker\Factory::create('fr_FR');

        ClientFactory::new()->createMany(15);
        VicoFactory::new()->createMany(3);
        ProjectFactory::createMany(15);
        RatingFactory::createMany(30);

        // $client = new Client();
        // $client->setFirstName('John');
        // $client->setLastName('Doe');
        // $client->setUsername('johndoe');
        // $client->setEmail('johndoe@gmail.com');
        // $client->setPassword('123456');
        // $client->setCreatedAt();
        // $manager->persist($client);

        // $manager->flush();

        // $client = new Client();
        // $client->setFirstName('Joey');
        // $client->setLastName('Tribbiani');
        // $client->setUsername('joeytribbiani');
        // $client->setEmail('joeytribbiani@gmail.com');
        // $client->setPassword('123456');
        // $manager->persist($client);

        // $client2 = new Client();
        // $client2->setFirstName('Phoebe');
        // $client2->setLastName('Buffay');
        // $client2->setUsername('phoebebuffay');
        // $client2->setEmail('phoebebuffay@gmail.com');
        // $client2->setPassword('123456');
        // $manager->persist($client2);
        
        // $client3 = new Client();
        // $client3->setFirstName('Chandler');
        // $client3->setLastName('Bing');
        // $client3->setUsername('chandlerbing');
        // $client3->setEmail('chandlerbing@gmail.com');
        // $client3->setPassword('123456');
        // $manager->persist($client3);

        // $client4 = new Client();
        // $client4->setFirstName('Monica');
        // $client4->setLastName('Galler');
        // $client4->setUsername('monicagaller');
        // $client4->setEmail('monicagaller@gmail.com');
        // $client4->setPassword('123456');
        // $manager->persist($client4);

        // $client5 = new Client();
        // $client5->setFirstName('Ross');
        // $client5->setLastName('Galler');
        // $client5->setUsername('rossgaller');
        // $client5->setEmail('rossgaller@gmail.com');
        // $client5->setPassword('123456');
        // $manager->persist($client5);

        // $client6 = new Client();
        // $client6->setFirstName('Rachel');
        // $client6->setLastName('Green');
        // $client6->setUsername('rachelgreen');
        // $client6->setEmail('rachelgreen@gmail.com');
        // $client6->setPassword('123456');
        // $manager->persist($client6);

        // $manager->flush();
    }
}
