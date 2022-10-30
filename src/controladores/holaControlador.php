<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class holaControlador{

    function hola(Request $request, Response $response, array $args) {
   
        $response->getBody()->write("Hello desde la consola");
        return $response;
    }

}