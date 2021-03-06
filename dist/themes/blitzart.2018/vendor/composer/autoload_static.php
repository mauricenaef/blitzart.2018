<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9eb295990fa3530698497af75b520686
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9eb295990fa3530698497af75b520686::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9eb295990fa3530698497af75b520686::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
