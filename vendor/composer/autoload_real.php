<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb6ec1253a701d17a2ac0e443f3997bdb
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

        spl_autoload_register(array('ComposerAutoloaderInitb6ec1253a701d17a2ac0e443f3997bdb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb6ec1253a701d17a2ac0e443f3997bdb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb6ec1253a701d17a2ac0e443f3997bdb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
