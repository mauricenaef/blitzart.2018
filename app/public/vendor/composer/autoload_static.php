<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc511354f05dc3bc1cd840b41ca388b20
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Carbon_Fields_Plugin\\' => 21,
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Carbon_Fields_Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wp-content/plugins/carbon-fields-plugin/core',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc511354f05dc3bc1cd840b41ca388b20::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc511354f05dc3bc1cd840b41ca388b20::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
