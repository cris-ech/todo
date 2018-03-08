<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {

        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager);
        $this->loadTasks($manager);

    }

    /**
     * @param ObjectManager $manager
     */
    public function loadTasks(ObjectManager $manager): void
    {
        $tasks = [
            ['aprender symfony' , 'cris'],
            ['ir al gym' , 'cris2'],
            ['comprar pan' , 'cris'],
        ];

        foreach ($tasks as $task) {
            $entity = new Task();
            $entity->setDescription($task[0]);
            $user = $this->getReference($task[1]);
            $entity->setOwner($user);

            $manager->persist($entity);

        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    private function loadUser(ObjectManager $manager)
    {
        $users = ['cris' ,
            'cris2',
            ];

        foreach ($users as $user){
            $entity = new user();
            $entity->setUsername($user);
            $password = $this->encoder->encodePassword($entity, 'secret');
            $entity->setPassword($password);

            $manager->persist($entity);
            $this->addReference($user, $entity);
        }

        $manager->flush();
    }
}
