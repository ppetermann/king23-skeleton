<?php
// register a service to read settings from
$container->register(
    \King23\Settings\SettingsInterface::class,
    function () use ($container) {
        return $container->get(\King23\Settings\SettingsChain::class);
    }
);

$container->register(
    \King23\Settings\SettingsChain::class,
    function () {
        return new \King23\Settings\SettingsChain();
    }
);
