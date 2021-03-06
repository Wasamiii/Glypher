<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0ec207b6b2e332183251b88e55256f0b
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'views\\' => 6,
        ),
        'm' => 
        array (
            'model\\' => 6,
        ),
        'c' => 
        array (
            'controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/views',
        ),
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0ec207b6b2e332183251b88e55256f0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0ec207b6b2e332183251b88e55256f0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0ec207b6b2e332183251b88e55256f0b::$classMap;

        }, null, ClassLoader::class);
    }
}
