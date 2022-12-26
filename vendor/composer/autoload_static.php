<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce044e1bd80223ef5428f90f8e3dd69b
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Edjs\\Edjshtml\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Edjs\\Edjshtml\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitce044e1bd80223ef5428f90f8e3dd69b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce044e1bd80223ef5428f90f8e3dd69b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitce044e1bd80223ef5428f90f8e3dd69b::$classMap;

        }, null, ClassLoader::class);
    }
}