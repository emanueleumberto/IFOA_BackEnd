<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit22aa00ba957f0c240eb9b654d823e1f1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'E' => 
        array (
            'Emau7\\Esercizio\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Emau7\\Esercizio\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit22aa00ba957f0c240eb9b654d823e1f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit22aa00ba957f0c240eb9b654d823e1f1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit22aa00ba957f0c240eb9b654d823e1f1::$classMap;

        }, null, ClassLoader::class);
    }
}