<?php

namespace App\DataFixtures;

use App\Entity\ClientUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $userPasswordEncoder;

    /**
     * UserFixtures constructor.
     * @param $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder) {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new ClientUser();
        $user->setEmail("test@gmail.com");
        $user->setPassword($this->userPasswordEncoder->encodePassword($user, "toto"));
        $user->setRoles(array("ROLE_USER"));

        $manager->persist($user);
        $manager->flush();
    }
}
