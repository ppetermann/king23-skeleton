<?php
// we provide a service that allows the mongo service to resolve what class is in what collection
$container->register(
    \King23\Mongo\ClassMapInterface::class,
    function () {
        // we return
        $mapper = new \King23\Mongo\CollectionNameIsClassMap();
        $mapper->setNamespace("\\EXAMPLE\\Model\\");
        return $mapper;
    }
);

// we create a regular MongoDB connection
$container->register(\MongoDB::class, function( ) use($container) {
    /** @var \King23\Settings\SettingsInterface $settings */
    $settings = $container->get(\King23\Settings\SettingsInterface::class);
    $connection = new MongoClient($settings->get('mongo.dsn'));
    return $connection->{$settings->get('mongo.db')};
});

// mongodb service
$container->register(\King23\Mongo\MongoServiceInterface::class, function() use($container){
    return $container->get(\King23\Mongo\MongoService::class);
});
