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

class editar{
     
    function editar(Request $request, Response $response,  $args) {
        $fs = new funcionesFirestore('mensajes');
        // borrar DESDE EL FRONT
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        $ObjetoProvenienteDelFront = json_decode( json_encode($ObjetoProvenienteDelFront), true);


        $nombreDELcoso = $ObjetoProvenienteDelFront['item2'];

        $fs->editarOK($nombreDELcoso, [
            ['path' => 'mensaje', 'value' => $ObjetoProvenienteDelFront['item']],
            // ['path' => 'nombre', 'value' => $ObjetoProvenienteDelFront['item2']]
        ]);
 

        return $response;
    }
}