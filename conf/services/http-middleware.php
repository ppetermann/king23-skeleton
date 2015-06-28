<?php
// register a middleware queue
$container->register(
    \King23\Http\MiddlewareQueueInterface::class,
    function () use ($container) {
        /** @var \King23\Http\MiddlewareQueue $queue */
        $queue = $container->getInstanceOf(\King23\Http\MiddlewareQueue::class);
        $queue->addMiddleware(\King23\Http\Middleware\Whoops\Whoops::class);
        $queue->addMiddleware(\Castle23\StaticFileMiddleware::class);
        $queue->addMiddleware(\King23\Http\RouterInterface::class);
        return $queue;
    }
);
