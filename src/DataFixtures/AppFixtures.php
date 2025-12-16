<?php

namespace App\DataFixtures;

use App\Entity\Link;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $link = new Link();
        $link->setLienUrl('https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html');
        $link->setLienTitre('DoctrineFixturesBundle');
        $link->setLienDesc('The DoctrineFixturesBundle allows you to load data fixtures for your Doctrine ORM entities into your database.');
        $manager->persist($link);

        $article = new Link();
        $article->setLienUrl('https://symfony.com/doc/current/components/console.html');
        $article->setLienTitre('Console Component');
        $article->setLienDesc('The Console component eases the creation of beautiful and testable command line interfaces.');
        $manager->persist($article);

        $manager->flush();
    }
}
