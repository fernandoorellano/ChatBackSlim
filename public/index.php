<?php
error_reporting(-1);
ini_set('display_errors', 1);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;

use App\fireControladores\crear;
use App\fireControladores\borrar;
use App\fireControladores\mostrar;
use App\fireControladores\editar;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
 
// Add error middleware
$app->addErrorMiddleware(true, true, true);
//  Enable CORS
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    
    $response = $handler->handle($request);
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post,put,delete,option');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    return $response;
});

$app->post('/editar/', editar::class.':editar');
// $app->get('/editar[/]', editar::class.':editar');
$app->post('/crear/', crear::class.':crear');
// $app->get('/crear[/]', crear::class.':crear');
$app->post('/borrar/',borrar::class.':borrar');
// $app->get('/borrar[/]',borrar::class.':borrar');
$app->get('/datos[/]',mostrar::class.':mostrar');

$app->run();

?>