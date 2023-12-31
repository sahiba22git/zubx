<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit638544f204e2c4f639a6296c307f71f7
{
    public static $files = array (
        'c65d09b6820da036953a371c8c73a9b1' => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit638544f204e2c4f639a6296c307f71f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit638544f204e2c4f639a6296c307f71f7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit638544f204e2c4f639a6296c307f71f7::$classMap;

        }, null, ClassLoader::class);
    }
}
