<?php

// this is the file for helper functions, i.e. functions that you want to be available globally throughout your templates. You can use it as a kind of wrapper/container for app classes that you need outside of the app

if (!function_exists('render_view')) {
    /**
     * Templating helper function
     * This is here for backwards compatibility, nostalgia and emergencies
     * but you probably don't need this.
     *
     * @deprecated Use tempate functions instead
     */
    function render_view(string $file, array $context = []): void
    {
        $v = \Forme\getInstance(\VendorName\ReplaceMeTheme\Core\View::class);
        echo $v->render($file, $context);
    }
}

if (!function_exists('view')) {
    /**
     * A convenience function for rendering a view
     * You probably don't need this in templates (just use the $v instance)
     * but comes in handy in other situations
     * e.g. when you want to render a view in another function.
     */
    function view(string $file, array $context = []): string
    {
        $v = \Forme\getInstance(\VendorName\ReplaceMeTheme\Core\View::class);

        return $v->render($file, $context);
    }
}

if (!function_exists('assets')) {
    /**
     * Assets directory with short syntax for template use.
     */
    function assets(?string $path): string
    {
        return \VendorName\ReplaceMeTheme\Core\Assets::uri($path ?? '');
    }
}

if (!function_exists('nav_menu')) {
    /**
     * Bootstrap nav menu with short syntax for use in templates.
     *
     * @deprecated Use menu() instead so we can say goodbye to nav walker awfulness
     *
     * @return void|string|false
     */
    function nav_menu()
    {
        return wp_nav_menu([
            'theme_location'  => 'header-menu',
            'container'       => false,
            'container_class' => false,
            'menu_class'      => 'navbar-nav mx-auto',
            'fallback_cb'     => 'Forme\Framework\Core\BootstrapNavWalker::fallback',
            'walker'          => \Forme\getInstance('Forme\\Framework\Core\\BootstrapNavWalker'),
            'echo'            => false,
        ]);
    }
}

if (!function_exists('menu')) {
    /**
     * This wraps wp nav menus in an eloquent model which you can then easily output in your views
     * No more terrible nav walkers!
     * it inherits url, title, classes, description and target directly but you can also access the underlying wordpress menu item post object
     * This will get you just the top level collection, you can then use ->childItems() to recurse down.
     */
    function menu(string $type): ?Illuminate\Database\Eloquent\Collection
    {
        return \Forme\Framework\Models\MenuItem::getByMenuType($type);
    }
}

if (!function_exists('option')) {
    /**
     * Get an acf option value by key with shorter syntax.
     *
     * @return mixed
     */
    function option(string $key)
    {
        return get_field($key, 'option');
    }
}
