<?php

$container = new \King23\DI\DependencyContainer();

// this is an arbitrary key value store for settings
$container->register(
    \King23\Core\SettingsInterface::class,
    function () {
        return new \King23\Core\Settings();
    }
);

// register a twig service
$container->register(
    \King23\TwigIntegration\TwigInterface::class,
    function () use ($container) {
        // Twig Template configuration
        Twig_Autoloader::register();

        $settings = $container->getInstanceOf(\King23\Core\SettingsInterface::class);

        return new King23\TwigIntegration\TwigWrapper(
            new Twig_Loader_Filesystem($settings->get('twig.path.templates', APP_PATH.'/templates')),
            [
                "cache" => $settings->get('twig.path.cache', APP_PATH."/cache/templates_c"),
                "debug" => $settings->get('twig.debug', true),
                "auto_reload" => $settings->get('twig.autoreload', true),
            ]
        );
    }
);

// register a router service
$container->register(
    \King23\Http\RouterInterface::class,
    function () use ($container) {
        return $container->getInstanceOf(\King23\Http\Router::class);
    }
);

// register a logging service
$container->register(
    \Psr\Log\LoggerInterface::class,
    function () {
        return new \Devedge\Log\NoLog();
    }
);

// lets register the zend-diactoros classes as our psr-7 stuff
$container->register(
    \Psr\Http\Message\ServerRequestInterface::class,
    function () {
        return \Zend\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
    }
);
$container->register(
    \Psr\Http\Message\ResponseInterface::class,
    function () {
        return new \Zend\Diactoros\Response();
    }
);

// register a middleware queue
$container->register(
    \King23\Http\MiddlewareQueueInterface::class,
    function () use ($container) {
        /** @var \King23\Http\MiddlewareQueue $queue */
        $queue = $container->getInstanceOf(\King23\Http\MiddlewareQueue::class);
        $queue->addMiddleware(\King23\Whoops\Middleware::class);
        $queue->addMiddleware(\King23\Http\RouterInterface::class);
        return $queue;
    }
);

// register the Application itself
$container->register(
    \King23\Http\ApplicationInterface::class,
    function () use ($container) {
        return $container->getInstanceOf(\King23\Http\Application::class);
    }
);

return $container;
