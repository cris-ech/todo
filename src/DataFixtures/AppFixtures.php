<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tasks = [
            'aprender symfony',
            'ir al gym',
            'comprar pan',
        ];

        foreach ($tasks as $task) {
            $entity = new Task();
            $entity->setDescription($task);

            $manager->persist($entity);

        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}