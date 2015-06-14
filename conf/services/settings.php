<?php
// register a service to read settings from
$container->register(
    \King23\Core\SettingsInterface::class,
    function () {
        return new \King23\Core\Settings();
    }
);
