<?php
namespace App\fireControladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use App\fireControladores\funcionesFirestore;

class crear{
     
    function crear(Request $request, Response $response,  $args) {
        $fs = new funcionesFirestore('users');
        // creo 'nuevo' dentro de 'users' DESDE EL FRONT
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
    
        // inserto valores a la coleccion
        $fs->newCollection('mensajes',[
            "nombre" => $ObjetoProvenienteDelFront->nombre,
            "mensaje" => $ObjetoProvenienteDelFront->mensaje,
            "fecha" => $ObjetoProvenienteDelFront->fecha,
        ]);

        // $fs->newDocument('nuevo',[
        //     "nombre" => $ObjetoProvenienteDelFront->nombre,
        //     // "email" => "emaildesdeelbackend",
        //     "mensaje" => $ObjetoProvenienteDelFront->mensaje,
        // ]); 


        return $response;
    }
}