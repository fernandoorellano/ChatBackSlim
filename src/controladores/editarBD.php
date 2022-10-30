<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

use App\controladores\Firestore;

class editarBD{
    // ok
    function editar(Request $request, Response $response,  $args) {
        $db = new Firestore();
        $collection = $db->setCollectionName("mensajes");

        $res = $collection->setDocumentName("7efc1a086be441f5affb")->updateDocument("nombre", "holafer23");
        print_r($res);
        return $response;
    }
}