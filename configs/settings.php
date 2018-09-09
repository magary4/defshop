<?php

define('APP_ROOT', __DIR__ . '/..');

return [
    'settings' => [

        // Doctrine
        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,

            // false to stop caching entity mapping. Only for debugging mapping.
            'entity_dev_mode' => true,

            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '/var/cache/doctrine',
            'proxy_dir' => APP_ROOT . '/var/cache/doctrine',

            // you should add any other path containing annotated entity classes
            //'metadata_dirs' => [APP_ROOT . '/src/Domain'],

            'xml_metadata_dirs' => [APP_ROOT . '/src/Adapter/Doctrine/mappings'],
            'php_metadata_dirs' => [APP_ROOT . '/configs/doctrine/mappings'],

            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'defshop_mysql',
                'port' => 3306,
                'dbname' => 'defshop',
                'user' => 'defshop',
                'password' => 'defshop',
                'charset' => 'utf8'
            ]
        ]
    ],
];
