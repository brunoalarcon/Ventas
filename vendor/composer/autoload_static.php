<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a13d1863ca8ae4c3913dfc308755d44
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libs\\' => 5,
        ),
        'A' => 
        array (
            'App\\controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs',
        ),
        'App\\controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a13d1863ca8ae4c3913dfc308755d44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a13d1863ca8ae4c3913dfc308755d44::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a13d1863ca8ae4c3913dfc308755d44::$classMap;

        }, null, ClassLoader::class);
    }
}
