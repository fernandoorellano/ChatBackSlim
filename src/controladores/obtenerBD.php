<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

use App\controladores\Firestore;

class obtenerBD{
    // ok
    function obtener(Request $request, Response $res,  $args) {
        $db = new Firestore();
        $collection = $db->setCollectionName("mensajes");
        
        $bd = $collection->setDocumentName("43706703f5f046b89bad")->getData();
       
        $a = array($bd);

        $res->getBody()->write(json_encode($a));
        return $res;
    }
}