<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit740bc4a0835f3855797ed497e6d4c2fd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../../model',
        ),
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../../class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit740bc4a0835f3855797ed497e6d4c2fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit740bc4a0835f3855797ed497e6d4c2fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit740bc4a0835f3855797ed497e6d4c2fd::$classMap;

        }, null, ClassLoader::class);
    }
}
