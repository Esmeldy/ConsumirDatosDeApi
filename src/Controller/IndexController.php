<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $lista_autores = file_get_contents('http://localhost/dwes/Unidad7/Tarea7/tarea7/api.php?action=get_listado_autores');
        // Convertimos el fichero JSON en array o en Objeto
        $lista_autores = json_decode($lista_autores);
       
        return $this->render('index/index.html.twig', [
            'listaAutores' => $lista_autores,
        ]);
    }
}
