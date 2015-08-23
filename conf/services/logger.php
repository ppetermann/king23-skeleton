<?php

// register a logging service
$container->register(
    \Psr\Log\LoggerInterface::class,
    function () {
        // replace this with any Psr compatible logger
        return new \Devedge\Log\NoLog();
    }
);
