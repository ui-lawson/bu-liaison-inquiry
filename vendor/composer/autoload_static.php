<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83a43bff8caa94ded7a01ab7f29fe114
{
    public static $classMap = array (
        'BULiaisonInquiry\\Plugin' => __DIR__ . '/../..' . '/src/class-plugin.php',
        'BULiaisonInquiry\\SpectrumAPI' => __DIR__ . '/../..' . '/src/class-spectrumapi.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit83a43bff8caa94ded7a01ab7f29fe114::$classMap;

        }, null, ClassLoader::class);
    }
}
