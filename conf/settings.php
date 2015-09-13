<?php
// this file contains the settings

/** @var \King23\Core\SettingsInterface $settings */
$settings = $container->getInstanceOf(\King23\Core\SettingsInterface::class);

// example settings for twig
$settings->set('twig.path.templates', APP_PATH . '/templates');
$settings->set('twig.path.cache', APP_PATH . "/cache/templates_c");
$settings->set('twig.debug', true);
$settings->set('twig.autoreload', true);

// mongo (enable if you want to use mongo)
//$settings->set('mongo.dsn', 'mongodb://localhost/King23');
//$settings->set('mongo.db', 'King23');

// a base path (if necessary), remember to add the BasePathStripper Middleware if you want to use this
// $settings->set('app.basePath', '/random');

