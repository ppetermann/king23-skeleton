<?php
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
