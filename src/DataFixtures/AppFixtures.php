<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Agent;
use App\Entity\Localite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class AppFixtures extends Fixture
{
    /**
     * Undocumented variable
     *
     * @var Generator
     */
    private Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
      for ($i=0; $i < 50; $i++) {
            $agent = new Agent();

            $agent->setNomagent($this->faker->firstName($gender =   'male' | 'female'))
                    ->setPrenomagent($this->faker->lastName())
                    ->setDatenais($this->faker->date())
                    ->setDatepaysalary($this->faker->date());
            $manager->persist($agent);
      }


             //Localité

             for ($j=0; $j < 50; $j++) { 
                $localite = new Localite();

                $localite->setLibloca($this->faker->word());
                $manager->persist($localite);
             }

        $manager->flush();
    }
}
