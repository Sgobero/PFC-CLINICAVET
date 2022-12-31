<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit740bc4a0835f3855797ed497e6d4c2fd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit740bc4a0835f3855797ed497e6d4c2fd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit740bc4a0835f3855797ed497e6d4c2fd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit740bc4a0835f3855797ed497e6d4c2fd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}