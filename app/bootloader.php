<?php

use Clickfwd\Yoyo\Twig\YoyoTwigExtension;
use Clickfwd\Yoyo\ViewProviders\TwigViewProvider;
use Clickfwd\Yoyo\Yoyo;
use Twig\Extension\DebugExtension;

define('APP_PATH', __DIR__);

$yoyo = new Yoyo();

$yoyo->configure([
  'url' => 'yoyo',
  'scriptsPath' => 'assets/js/',
  'namespace' => 'App\\Yoyo\\',
]);

$loader = new \Twig\Loader\FilesystemLoader([
  APP_PATH.'/resources/views',
  APP_PATH.'/resources/views/yoyo',
  // APP_PATH.'/resources/views/components'
]);

$twig = new \Twig\Environment($loader, [
  'cache' => APP_PATH.'/../cache',
  'auto_reload' => true,
  // 'debug' => true
]);

$twig->addExtension(new YoyoTwigExtension());

// $twig->addExtension(new DebugExtension());

$yoyo->setViewProvider(new TwigViewProvider($twig));
