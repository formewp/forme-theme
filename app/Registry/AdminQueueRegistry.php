<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Registry;

use Forme\Framework\Registry\RegistryInterface;

// use VendorName\ReplaceMeTheme\Core\Assets; // uncomment this to include the Assets helper class

class AdminQueueRegistry implements RegistryInterface
{
    public function register(): void
    {
        // add script & style enqueues here
        /*
         * for example
         * wp_enqueue_style('name', 'path/to/assets/css/styles.css', [], 'version', 'all');
         * use the Assets static class for some useful helper functions
         * wp_enqueue_script('scriptname', Assets::uri('js/scripts.js'), ['jquery'], Assets::time('js/scripts.js'), false)
         */
    }
}
