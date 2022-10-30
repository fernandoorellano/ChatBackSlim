<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;
 
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class users{

    protected $db;
    protected $name;

    public function __construct(string $collection)
    {
        $this->db = new FirestoreClient([
            "projectId" => "loginchat-8eb20"
        ]);

        $this->name = $collection;
    }

    // BORRO LOS CAMPOS
    public function dropDocument(string $name)
        {
        $this->db->collection($this->name)->document($name)->delete();
    }
    // OBTENGO VALOR TODO EL DOCUMENTO, CON IDS :DDDDDDDDDDDDDDDDD
    public function getDocument2()
        {
        $query = $this->db->collection('mensajes');
        $documents = $query->documents();

        foreach ($documents as $document) {
            printf('Document data for document %s:' . PHP_EOL, $document->id());
            print_r($document->data());
            printf(PHP_EOL);
        }
    }
    // OBTENGO VALOR TODO EL DOCUMENTO, sin ID
    public function getDocument()
    {
    $query = $this->db->collection('mensajes');
    $documents = $query->documents();

    foreach ($documents as $document) {
        print_r($document->data());
        }
    }
    // creo 'nuevo' dentro de 'users'
    public function newDocument(string $name, array $data = [])
    {
        try {
            $this->db->collection($this->name)->document($name)->create($data);
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    // CREO UNA COLEECIION CON NOMBRE Y MAIL, ANDA JOYA
    public function newCollection(string $name, array $data = [])
    {
        try {
            $this->db->collection($name)->add($data);
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}