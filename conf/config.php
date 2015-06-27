<?php
/*
 MIT License
 Copyright (c) 2010 Peter Petermann

 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
 restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the
 Software is furnished to do so, subject to the following
 conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 OTHER DEALINGS IN THE SOFTWARE.

*/

if (!defined("APP_PATH")) {
    define("APP_PATH", realpath(dirname(__FILE__)."/.."));
}

// composer autoload
require_once APP_PATH."/vendor/autoload.php";

/** @var \King23\DI\ContainerInterface $container */
$container = require_once APP_PATH."/conf/services.php";

/** @var \King23\Core\SettingsInterface $settings */
$settings = $container->getInstanceOf(\King23\Core\SettingsInterface::class);

// example settings (example using twig)
$settings->set('twig.path.templates', APP_PATH.'/templates');
$settings->set('twig.path.cache', "/tmp/phar.space/cache/templates_c");
$settings->set('twig.debug', true);
$settings->set('twig.autoreload', true);

// mongo
$settings->set('mongo.dsn', 'mongodb://localhost/King23');
$settings->set('mongo.db', 'King23');

require_once APP_PATH . "/conf/routes.php";

return $container;
