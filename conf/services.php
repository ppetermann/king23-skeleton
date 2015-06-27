<?php

$container = new \King23\DI\DependencyContainer();

// settings service
require_once APP_PATH . "/conf/services/settings.php";

// router, application, request/response
require_once APP_PATH . "/conf/services/http.php";

// middleware queue
require_once APP_PATH . "/conf/services/http-middleware.php";

// twig template system
require_once APP_PATH . "/conf/services/twig.php";

// psr-logger
require_once APP_PATH . "/conf/services/logger.php";

// mongodb integration
require_once APP_PATH . "/conf/services/mongo.php";

// react php
require_once APP_PATH . "/conf/services/react.php";

// knight23 php
require_once APP_PATH . "/conf/services/knight23.php";


return $container;
