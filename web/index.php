<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$app->get('/', function () {
  $output = array("questions_url" => "/questions");
  return new JsonResponse($output);
});

// $app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogPosts) {
//     if (!isset($blogPosts[$id])) {
//         $app->abort(404, "Post $id does not exist.");
//     }

//     $post = $blogPosts[$id];

//     return  "<h1>{$post['title']}</h1>".
//             "<p>{$post['body']}</p>";
// });

// $app->post('/feedback', function (Request $request) {
//     $message = $request->get('message');
//     mail('feedback@yoursite.com', '[YourSite] Feedback', $message);

//     return new Response('Thank you for your feedback!', 201);
// });


$app->error(function (\Exception $e, $code) {
    return new JsonResponse('We are sorry, but something went terribly wrong.');
});

$app->run();
