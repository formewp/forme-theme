<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme;

use Forme\Framework\Core\Loader;

/**
 * The core theme class.
 */
class Main
{
    /**
     * The loader which is reponsible for registering all hooks.
     *
     * @since    1.0.0
     *
     * @var Loader Holds and registers all hooks for the theme
     */
    protected $loader;

    public function __construct(Loader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * Initialise the loader and run it.
     *
     * @since    1.0.0
     */
    public function run(): void
    {
        $this->initialiseLoader();
        $this->loader->run();
    }

    /**
     * Prepare the loader.
     *
     * @since    1.0.0
     */
    private function initialiseLoader(): void
    {
        // add all the hooks to the loader
        $this->loader->addConfig(file_get_contents(__DIR__ . '/config/hooks.yaml'));

        // this can also be done explicitly without using the config yaml e.g.
        // $this->loader->addAction('hook_name', \Forme\getInstance('FooActionClass'), 'barMethod');
        // but this not really recommended as the api could change in the future
    }
}
