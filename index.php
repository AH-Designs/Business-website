
<?php 
require __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('Europe/London');




$log = new Monolog\Logger('name');
 $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');


$app = new \Slim\Slim(array(
  'view' => new \Slim\Views\Twig()
));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
);

$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/',function() use($app){
   $app->render("index.twig");
 });

$app->get('/contact', function()use($app){
  $app->render("contact.twig");
});

$app->get('/about', function()use($app){
  $app->render("about.twig");
});

$app->get('/services', function()use($app){
  $app->render("services.twig");
});

$app -> run();

