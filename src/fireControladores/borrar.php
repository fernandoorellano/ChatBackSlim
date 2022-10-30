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

class borrar{
     
    function borrar(Request $request, Response $response,  $args) {
        $fs = new funcionesFirestore('mensajes');
        // borrar DESDE EL FRONT
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        $ObjetoProvenienteDelFront = json_decode( json_encode($ObjetoProvenienteDelFront), true);
        // borro coleccion
        $fs->dropDocument($ObjetoProvenienteDelFront['item']);
        
        return $response;
    }
}