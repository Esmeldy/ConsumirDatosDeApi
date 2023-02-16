<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{
    #[Route('/librosdeautor/{idAutor}', name: 'libros')]
    public function index($idAutor): Response
    {
        $librosDeAutor = file_get_contents('http://localhost/dwes/Unidad7/Tarea7/tarea7/api.php?action=get_datos_autor&id_autor='. $idAutor);
        $librosDeAutor = json_decode($librosDeAutor);

        return $this->render('libro/index.html.twig', [
            'controller_name' => 'LibroController',
            'librosDeAutor' => $librosDeAutor,
        ]);
    }
}
