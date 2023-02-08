<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Argent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class AppFixtures extends Fixture
{
    /**
     *
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
            $agent = new Argent;
            $agent->setnameagent($this->faker->firstName($gender =   'male' | 'female'))
                ->setsurnameagent($this->faker->lastName())
                ->setbirthday($this->faker->dateTime())
                ->setDatepaysalary($this->faker->dateTime());
                $manager->persist($agent);
       }

        $manager->flush();
    }
}
