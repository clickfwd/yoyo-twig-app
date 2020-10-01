<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Clickfwd\Yoyo\Yoyo;

require __DIR__.'/vendor/autoload.php';

$app = AppFactory::create();

require __DIR__.'/app/bootloader.php';

$app->get('/', function (Request $request, Response $response, $args) {

  $twig = Yoyo::getViewProvider()->getProviderInstance();

  // For dynamic content component
  $entries = include(APP_PATH.'/test-data.php');
  shuffle($entries);
  $entries = array_splice($entries,0,3);

  $content = $twig->render('layout.twig', [
    'components' => [
      'counter' => [],
      'upload' => [],
      'nesting-parent' => [],
      'wishlist-counter' => [
          'attributes' => ['id' => 'wishlist-counter']
      ],
      'live-search' => [],
      'load-more' => [],
      'pagination' => [],
      'dynamic-content' => [
          'variables' => ['entries' => $entries],
      ],
      'polling' => [],
      'form' => [],    
    ]
  ]); 

  $response->getBody()->write($content);

  return $response;
  
});

$app->any('/yoyo', function (Request $request, Response $response, $args) 
{
  // Routing to component name → action

  $output = (new Yoyo())->update();
  
  $response->getBody()->write($output);
  
  return $response;
});

$app->run();
