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

class mostrar{
     
    function mostrar(Request $request, Response $response,  $args) {
        $fs = new funcionesFirestore('users');
        $query = $fs->db->collection('mensajes')->orderBy('fecha', 'ASC');
        $documents = $query->documents();

        $mData=array();
        
        foreach ($documents as $document) {
            // $mData[]=$document->data();
            $mData[]=[$document->data(),$document->id()];
        }
 
        $response->getBody()->write(json_encode($mData));
        return $response;
    }
}