<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

use App\controladores\Firestore;

class enviarBD{
    
    function enviar(Request $request, Response $response,  $args) {
        $db = new Firestore();
        $collection = $db->setCollectionName("mensajes");
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        // $nombre= $ObjetoProvenienteDelFront->nombre;

        $res = $collection->newDocument([
            "nombre" => $ObjetoProvenienteDelFront->nombre,
            // "email" => "emaildesdeelbackend",
            "mensaje" => $ObjetoProvenienteDelFront->mensaje,
        ]); 
        // imprimpo el id
        // print_r($res);
        return $response;
    }
 
    
}
