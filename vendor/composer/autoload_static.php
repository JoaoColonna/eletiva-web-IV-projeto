<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd161d23df1edf2519bf677b08af8b42b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Php\\Projetocomposer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Php\\Projetocomposer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd161d23df1edf2519bf677b08af8b42b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd161d23df1edf2519bf677b08af8b42b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd161d23df1edf2519bf677b08af8b42b::$classMap;

        }, null, ClassLoader::class);
    }
}
