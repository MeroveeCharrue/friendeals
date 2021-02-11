<?php

namespace Friendeals\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        $joe = 'yo';

        return $this->render(
            'home/home.html.twig',
            [
                'hey' => $joe
            ]
        );
    }
}
