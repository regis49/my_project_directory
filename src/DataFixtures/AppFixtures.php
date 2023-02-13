<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Agent;
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



        $manager->flush();
    }
}
