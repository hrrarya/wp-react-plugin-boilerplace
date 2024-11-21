<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c56208d0f9e4131f19c40fb9bd17e05
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'InventoryPos\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'InventoryPos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c56208d0f9e4131f19c40fb9bd17e05::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c56208d0f9e4131f19c40fb9bd17e05::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c56208d0f9e4131f19c40fb9bd17e05::$classMap;

        }, null, ClassLoader::class);
    }
}
