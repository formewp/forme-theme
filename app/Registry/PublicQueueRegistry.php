<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Registry;

use Forme\Framework\Registry\RegistryInterface;
use VendorName\ReplaceMeTheme\Core\Assets;

class PublicQueueRegistry implements RegistryInterface
{
    public function register(): void
    {
        // add script & style enqueues here that aren't going via js/css imports
        /*
         * for example
         * wp_enqueue_style('name', 'path/to/assets/css/styles.css', [], 'version', 'all');
         * use the Assets static class for some useful helper functions
         * wp_enqueue_script('scriptname', Assets::uri('js/scripts.js'), ['jquery'], Assets::time('js/scripts.js'), false)
         */
        // lose the wp jquery and replace with latest
        // it would probably be risky to bypass enqueue for jQuery due to third party plugins so let's keep it here
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js"', [], false, true);

        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');

        // we do everything else via encore/dist or static
        wp_enqueue_style('replace-me-theme-public-styles', Assets::uri('app.css'), [], Assets::time('app.css'));
        wp_enqueue_script('replace-me-theme-public-scripts', Assets::uri('app.js'), ['jquery'], Assets::time('app.js'), true);
    }

    /**
     * Make enqueues into browser modules so that we can use all the include goodness.
     */
    public function moduleTag(string $tag, string $handle, string $src): string
    {
        // bail if not script or if dist exists
        if ($handle !== 'replace-me-theme-public-scripts' || Assets::distExists()) {
            return $tag;
        }
        // make this a module
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
}
