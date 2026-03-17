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

        if (Assets::devServerActive()) {
            // Dev: inject the Vite client in the head, then the entry module.
            // CSS is injected by Vite automatically — no wp_enqueue_style needed.
            wp_enqueue_script('vite-client', Assets::viteClientUri(), [], null, false);
            wp_enqueue_script('replace-me-theme-public-scripts', Assets::uri('assets/src/js/app.js'), [], null, false);
        } else {
            // Production: enqueue CSS extracted by Vite from the entry, then the hashed JS.
            $version    = Assets::time('assets/src/js/app.js');
            $cssPaths   = Assets::cssFromManifest('assets/src/js/app.js');

            foreach ($cssPaths as $index => $cssUri) {
                wp_enqueue_style(
                    'replace-me-theme-public-styles-' . $index,
                    $cssUri,
                    [],
                    $version
                );
            }

            wp_enqueue_script(
                'replace-me-theme-public-scripts',
                Assets::uri('assets/src/js/app.js'),
                ['jquery'],
                $version,
                true
            );
        }    }

    /**
     * Add type="module" to Vite-managed script tags.
     * Vite output (both dev and production) is ES module format.
     */
    public function moduleTag(string $tag, string $handle, string $src): string
    {
        $moduleHandles = ['vite-client', 'replace-me-theme-public-scripts'];

        if (!in_array($handle, $moduleHandles, true)) {
            return $tag;
        }

        return '<script type="module" src="' . esc_url($src) . '"></script>' . "\n";
    }
}
