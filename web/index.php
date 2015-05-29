<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/fixtures.php';

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$app->get('/', function () {
  $output = array("questions_url" => "/questions");
  return new JsonResponse($output);
});

$app->get('/questions/{question_id}', function (Silex\Application $app, $question_id) use ($questions) {
  return new JsonResponse($questions);
});


$app->error(function (\Exception $e, $code) {
    return new JsonResponse('We are sorry, but something went terribly wrong.');
});

$app->run();
