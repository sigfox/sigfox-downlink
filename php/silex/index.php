<?php

require('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

$app->get('/', function(){
  return new Response('Nothing here', 405);
    
});

$app->post('/sigfox', function (Request $request) use ($app) {
  $app['monolog']->addInfo('Downlink');
  
  $app['monolog']->addInfo(sprintf('Content-Type %s', $request->headers->get('Content-Type')));
  
  
  if ($request->headers->get('Content-Type') === 'application/json'){
    $data = json_decode($request->getContent(), true);
    $request->request->replace(is_array($data) ? $data : array());
  }
  
  
  $deviceId = $request->get('deviceId');
  $app['monolog']->addInfo(sprintf('deviceId - %s', $request->get('deviceId')));
  $app['monolog']->addInfo(sprintf('rssi - %s', $request->get('rssi')));
  
  if (is_null($deviceId)){
    return new Response("", 204);
  }
  
  $message = "01234567890ABCDE";
  
  $output = array($deviceId=>array("downlinkData"=>$message));
  
  
  $response = new Response(json_encode($output), 200);
  $response->headers->set('Content-Type', 'application/json');
  return $response;
});

$app->run();
