<?php

namespace App\DataFixtures;

use App\Entity\Keyword;
use App\Entity\Link;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $keyword1 = new Keyword();
        $keyword1->setName('Symfony');
        $manager->persist($keyword1);

        $keyword2 = new Keyword();
        $keyword2->setName('Doctrine');
        $manager->persist($keyword2);

        $keyword3 = new Keyword();
        $keyword3->setName('PHP');
        $manager->persist($keyword3);

        $link = new Link();
        $link->setLienUrl('https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html');
        $link->setLienTitre('DoctrineFixturesBundle');
        $link->setLienDesc('The DoctrineFixturesBundle allows you to load data fixtures for your Doctrine ORM entities into your database.');
        $link->addKeyword($keyword1);
        $link->addKeyword($keyword2);
        $manager->persist($link);

        $article = new Link();
        $article->setLienUrl('https://symfony.com/doc/current/components/console.html');
        $article->setLienTitre('Console Component');
        $article->setLienDesc('The Console component eases the creation of beautiful and testable command line interfaces.');
        $article->addKeyword($keyword1);
        $manager->persist($article);

        $user = new User();
        $user->setUsername('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $password = $this->hasher->hashPassword($user, 'adminpass');
        $user->setPassword($password);
        $manager->persist($user);


        $manager->flush();
    }
}
