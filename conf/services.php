<?php

$container = new \King23\DI\DependencyContainer();

// settings service
require_once "services/settings.php";

// router, application, request/response
require_once "services/http.php";

// middleware queue
require_once "services/http-middleware.php";

// twig template system
require_once "services/twig.php";

// psr-logger
require_once "services/logger.php";

// mongodb integration
require_once "services/mongo.php";

return $container;
