<?php

// lets register the zend-diactoros classes as our psr-7 stuff
// request class
$container->register(
    \Psr\Http\Message\ServerRequestInterface::class,
    function () {
        return \Zend\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
    }
);
// response class
$container->register(
    \Psr\Http\Message\ResponseInterface::class,
    function () {
        return new \Zend\Diactoros\Response();
    }
);

// register a router service
$container->register(
    \King23\Http\RouterInterface::class,
    function () use ($container) {
        return $container->getInstanceOf(\King23\Http\Router::class);
    }
);

// register the Application itself
$container->register(
    \King23\Http\ApplicationInterface::class,
    function () use ($container) {
        return $container->getInstanceOf(\King23\Http\Application::class);
    }
);
