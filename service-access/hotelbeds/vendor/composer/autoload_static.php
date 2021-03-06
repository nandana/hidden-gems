<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b8b145f7ea322a2a0136ac2de716b35
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'hotelbeds\\hotel_api_sdk\\' => 24,
        ),
        'Z' => 
        array (
            'Zend\\Validator\\' => 15,
            'Zend\\Uri\\' => 9,
            'Zend\\Stdlib\\' => 12,
            'Zend\\Loader\\' => 12,
            'Zend\\Json\\' => 10,
            'Zend\\Hydrator\\' => 14,
            'Zend\\Http\\' => 10,
            'Zend\\Escaper\\' => 13,
            'Zend\\Config\\' => 12,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'hotelbeds\\hotel_api_sdk\\' => 
        array (
            0 => __DIR__ . '/..' . '/hotelbeds/hotel-api-sdk-php/src',
        ),
        'Zend\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-validator/src',
        ),
        'Zend\\Uri\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-uri/src',
        ),
        'Zend\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-stdlib/src',
        ),
        'Zend\\Loader\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-loader/src',
        ),
        'Zend\\Json\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-json/src',
        ),
        'Zend\\Hydrator\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-hydrator/src',
        ),
        'Zend\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-http/src',
        ),
        'Zend\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-escaper/src',
        ),
        'Zend\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-config/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'StringTemplate\\Test' => 
            array (
                0 => __DIR__ . '/..' . '/nicmart/string-template/tests',
            ),
            'StringTemplate' => 
            array (
                0 => __DIR__ . '/..' . '/nicmart/string-template/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b8b145f7ea322a2a0136ac2de716b35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b8b145f7ea322a2a0136ac2de716b35::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4b8b145f7ea322a2a0136ac2de716b35::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
