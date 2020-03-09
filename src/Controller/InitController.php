<?php
// src/Controller/InitController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;

// Pour serializer et renvoyer du json
use Symfony\Component\Validator\Constraints\Json;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
        $users = ['Michel', 'Nelson', 'Patrick'];
        $usersDetail = [
            [
                "nom" => "Michel",
                "age" => 102,
                "sexe" => "oui"
            ],
            [
                "nom" => "Nelson",
                "age" => 1,
                "sexe" => "non"
            ],
            [
                "nom" => "Patrick",
                "age" => 24,
                "sexe" => "undefined"
            ]
        ];
        $heroes = [
            new User("Batman", "Trop badass"),
            new User("Superman", "super cheveux"),
            new User("Catwoman", "sacrées griffes")
        ];
        return $this->render('boucle.html.twig', [
            'users' => $users,
            'usersDetail' => $usersDetail,
            'heroes' => $heroes
        ]);
    }
    /**
     * @Route("/api", methods={"GET","HEAD"})
     */
    public function api(){
        $heroes = [
            new User("Batman", "A Robin en adjoint"),
            new User("Superman", "Vole en collants"),
            new User("Catwoman", "Miaou")
        ];
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($heroes, 'json');
        $response = JsonResponse::fromJsonString($json);
        return $response;        
    }

    /**
     * @Route("/detail/{id}", methods={"GET"})
     */
    public function detail($id) {
        $heroes = [
            new User("Batman", "A Robin en adjoint"),
            new User("Superman", "Vole en collants"),
            new User("Catwoman", "Miaou")
        ];
        return $this->render('detail.html.twig', [
            'id'=> $id,
            'heroes'=> $heroes
        ]);
    }


}
