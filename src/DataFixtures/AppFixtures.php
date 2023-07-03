<?php

namespace App\DataFixtures;

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
        VicoFactory::new()->createMany(5);
        $projects = '';
        RatingFactory::createMany(15, function() use ($projects){
            $projects = ProjectFactory::new()->createMany(1);
            return [
                'project_id' => $projects[array_rand($projects)]
            ];
        });

        $manager->flush();
    }
}
