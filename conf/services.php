<?php
$container = new \King23\DI\DependencyContainer();

// the output writer
/*
$container->register(
    \Knight23\Core\Output\WriterInterface::class,
    function () use ($container) {
        return $container->getInstanceOf(\Knight23\Core\Output\ColoredTextWriter::class);
    }
);
*/

return $container;
