<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatosLibroController extends AbstractController
{
    #[Route('/datoslibro/{idLibro}', name: 'app_datos_libro')]
    public function index($idLibro): Response
    {
        // Convertimos el fichero JSON en array o en Objeto
        $Libro = file_get_contents('http://localhost/dwes/Unidad7/Tarea7/tarea7/api.php?action=get_datos_libro&id_libro='.$idLibro);
        // Convertimos el fichero JSON en array o en Objeto
        $Libro = json_decode($Libro);

        return $this->render('datos_libro/index.html.twig', [
            'controller_name' => 'DatosLibroController',
            'Libro' => $Libro,
        ]);
    }
}
