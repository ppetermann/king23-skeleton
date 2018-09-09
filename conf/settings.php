<?php
// this file contains the settings

/** @var \King23\Settings\SettingsChain $settingsChain */
$settingsChain = $container->get(\King23\Settings\SettingsChain::class);

/** @var \King23\Settings\SimpleSettings $settings */
$settings = $container->get(\King23\Settings\SimpleSettings::class);
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


// register the simple settings with our settings chain
$settingsChain->registerSettingsProvider($settings);

// note: this sets some very basic settings, in most applications you will need more
// and thus will be better off with using the King23\Settings\JsonSettings
//
// $settingsChain->registerSettingsProvider(JsonSettings::fromFilename(APP_PATH . "/conf/settings.json"));
//
// example settings.json:
//
// {
//    "twig": {
//        "path": {
//            "templates": "../templates",
//            "cache": "../cache/templates_c"
//        },
//        "debug": true,
//        "autoreload": true
//    },
//
//    "mongo": {
//        "dsn": "mongodb://localhost",
//        "db": "devedge"
//    }
// }
//
//
// the settings chain being used allows you to use a list of SettingInterface implementations
// where the last one registered will be asked first, and if no value is found (null), the next
// implementation will be asked.
