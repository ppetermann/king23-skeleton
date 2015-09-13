<?php
// register a middleware queue
$container->register(
    \King23\Http\MiddlewareQueueInterface::class,
    function () use ($container) {
        /** @var \King23\Http\MiddlewareQueue $queue */
        $queue = $container->getInstanceOf(\King23\Http\MiddlewareQueue::class);

        // uncomment the next line to add the BasePathStripper Middleware
        // $queue->addMiddleware(\King23\Http\Middleware\BasePathStripper::class);

        // use Whoops Middleware - you should disable this for production!
        $queue->addMiddleware(\King23\Http\Middleware\Whoops\Whoops::class);

        // the King23 router - configure in conf/routes.php
        $queue->addMiddleware(\King23\Http\RouterInterface::class);
        return $queue;
    }
);
