<?php
namespace App\controladores;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

class users2
{
    // CREO QUE NO SIRVE
    // DESPUES HAY QUE BOORRAR
    public FirestoreClient $firestore;
    public string $collectionName;
    public string $documentName;

    protected $db;
    protected $name;

    public function __construct(string $collection)
    {
        $this->db = new FirestoreClient([
            // "keyFilePath" => "keys/loginchat-8eb20-f4b58ead45cb.json",
            "projectId" => "loginchat-8eb20"
        ]);

        $this->name = $collection;
    }

    public function getDocument(string $name)
        {
        return $this->db->collection($this->name)->document($name)->snapshot()->data();
    }



 
     function setCollectionName(string $name): Firestore
    {
        $this->collectionName = $name;
        return $this;
    }
 
     function setDocumentName(string $name): Firestore
    {
        !empty($this->collectionName) || die ("porfaescribi CollectionName");

        $this->documentName = $name;
        return $this;
    }
  
  

  
     function getData(string $key = "")
    {
        if(!empty($key)) {
            return $this->getDocument()->snapshot()->get($key);
        } else {
            return $this->getDocument()->snapshot()->data( );
        }
    }
  
     function newDocument(array $data): string
    {
        !empty($this->collectionName) || die ("porfaescribi CollectionName");
        return $this->firestore->collection($this->collectionName)->add($data)->id();
    }
    // estoy aca sabes
    // function verColeccio(): string
    // {
    //     return $this->firestore->collection($this->collectionName);
    // }
 

     function deleteDocument(string $name): array
    {
        !empty($this->collectionName) || die ("porfaescribi CollectionName");
        return $this->firestore->collection($this->collectionName)->document($name)->delete();
    }

     function updateDocument(string $key, $value)
    {
        !empty($this->collectionName) || die ("porfaescribi CollectionName");
        $status = $this->firestore->collection($this->collectionName)->document($this->documentName)->update([
        [
            "path"=>$key,
            "value"=> $value,
        ],
        ], [
            "merge"=>true,
        ]);

        return $status["updateTime"];

    }



}