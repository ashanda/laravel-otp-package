<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98ec17bca38b96d585f44f615f103288
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Geekmac\\Otpsend\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Geekmac\\Otpsend\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit98ec17bca38b96d585f44f615f103288::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98ec17bca38b96d585f44f615f103288::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit98ec17bca38b96d585f44f615f103288::$classMap;

        }, null, ClassLoader::class);
    }
}
