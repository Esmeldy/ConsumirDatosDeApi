<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListaLibrosController extends AbstractController
{
    #[Route('/listalibros', name: 'lista_libros')]
    public function index(): Response
    {   
        // Convertimos el fichero JSON en array o en Objeto
        $Libros = file_get_contents('http://localhost/dwes/Unidad7/Tarea7/tarea7/api.php?action=get_datos_autor');
        // Convertimos el fichero JSON en array o en Objeto
        $Libros = json_decode($Libros);

        return $this->render('lista_libros/index.html.twig', [
            'controller_name' => 'ListaLibrosController',
            'Libros' => $Libros,
        ]);
    }
}
