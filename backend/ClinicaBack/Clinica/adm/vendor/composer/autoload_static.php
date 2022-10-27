<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad079684a2a097c59a550c836d4a1930
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
            'Adms\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Adms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/adms',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad079684a2a097c59a550c836d4a1930::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad079684a2a097c59a550c836d4a1930::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad079684a2a097c59a550c836d4a1930::$classMap;

        }, null, ClassLoader::class);
    }
}
