<?php /** @noinspection PhpUnhandledExceptionInspection */

$psr17factory = function () {
    return new \Nyholm\Psr7\Factory\Psr17Factory();
};

/** @var \King23\DI\ContainerInterface $container */
$container->register(\Psr\Http\Message\RequestFactoryInterface::class, $psr17factory);
$container->register(\Psr\Http\Message\ServerRequestFactoryInterface::class, $psr17factory);
$container->register(\Psr\Http\Message\ResponseFactoryInterface::class, $psr17factory);
$container->register(\Psr\Http\Message\StreamFactoryInterface::class, $psr17factory);
$container->register(\Psr\Http\Message\UploadedFileFactoryInterface::class, $psr17factory);
$container->register(\Psr\Http\Message\UriFactoryInterface::class, $psr17factory);

$container->register(\Psr\Http\Message\ServerRequestInterface::class,
    function () use ($container) {
        return (new \Nyholm\Psr7Server\ServerRequestCreator(
            $container->get(\Psr\Http\Message\RequestFactoryInterface::class),
            $container->get(\Psr\Http\Message\UriFactoryInterface::class),
            $container->get(\Psr\Http\Message\UploadedFileFactoryInterface::class),
            $container->get(\Psr\Http\Message\StreamFactoryInterface::class)
        ))->fromGlobals();
    }
);

// register a router service
$container->register(
    \King23\Http\RouterInterface::class,
    function () use ($container) {
        return $container->get(\King23\Http\Router::class);
    }
);

// register the Application itself
$container->register(
    \King23\Http\ApplicationInterface::class,
    function () use ($container) {
        return $container->get(\King23\Http\Application::class);
    }
);
