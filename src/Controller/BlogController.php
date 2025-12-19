<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(LinkRepository $linkRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'links' => $linkRepository->findAll(),
        ]);
    }
}
