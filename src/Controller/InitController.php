<?php
// src/Controller/InitController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InitController extends AbstractController
{
    /**
     * @Route("/testRoute/")
     */
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    /**
     * @Route("/templating")
     */
    public function templating()
    {
        return $this->render('templating.html.twig', [
            'prenom' => 'Hugo',
            'nom' => 'Nicolas',
        ]);
    }

    /**
     * @Route("/boucle")
     */
    public function boucle()
    {
        return $this->render('boucle.html.twig');
    }
}
