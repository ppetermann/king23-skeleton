<?php

// register a logging service
$container->register(
    \Psr\Log\LoggerInterface::class,
    function () {
        return new \Devedge\Log\NoLog();
    }
);
