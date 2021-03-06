<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83a43bff8caa94ded7a01ab7f29fe114
{
    public static $classMap = array (
        'BU\\Plugins\\Liaison_Inquiry\\Admin' => __DIR__ . '/../..' . '/includes/class-admin.php',
        'BU\\Plugins\\Liaison_Inquiry\\Inquiry_Form' => __DIR__ . '/../..' . '/includes/class-inquiry-form.php',
        'BU\\Plugins\\Liaison_Inquiry\\Plugin' => __DIR__ . '/../..' . '/includes/class-plugin.php',
        'BU\\Plugins\\Liaison_Inquiry\\Sample_Spectrum_API' => __DIR__ . '/../..' . '/includes/class-sample-spectrum-api.php',
        'BU\\Plugins\\Liaison_Inquiry\\Settings' => __DIR__ . '/../..' . '/includes/class-settings.php',
        'BU\\Plugins\\Liaison_Inquiry\\Spectrum_API' => __DIR__ . '/../..' . '/includes/class-spectrum-api.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit83a43bff8caa94ded7a01ab7f29fe114::$classMap;

        }, null, ClassLoader::class);
    }
}
