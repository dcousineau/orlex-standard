<?php
define('CACHE_PATH', dirname(__DIR__) . '/tmp/cache');

date_default_timezone_set('America/Chicago');

//Setup App/DI Container
$app = new Silex\Application();

//Default environment and debugging
$app['environment'] = isset($_SERVER['ENVIRONMENT']) ? $_SERVER['ENVIRONMENT'] : 'prod';
$app['debug']       = $app['environment'] == 'dev' ? true : false;

////
// URLS
////
$app->register(new \Silex\Provider\UrlGeneratorServiceProvider());

////
// TWIG
////

if (!file_exists(CACHE_PATH . '/twig')) mkdir(CACHE_PATH . '/twig', 0755, true);
$twig_options = [
    'cache' => CACHE_PATH . '/twig',
];

if ($app['debug']) {
    unset($twig_options['cache']);
}

$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.options'        => $twig_options,
    'twig.path'           => dirname(__DIR__) . '/src/App/Views/',
//    'twig.form.templates' => [
//        'form_layout.html.twig'
//    ]
]);

//$app['twig'] = $app->share($app->extend('twig', function($twig, $app){
//    /** @var $twig Twig_Environment */
//    $twig->addExtension(new App\Twig\Extension\Foo());
//
//    return $twig;
//}));

return $app;