<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Registry;

use Forme\Framework\Registry\RegistryInterface;

class ThemeSupportRegistry implements RegistryInterface
{
    public function register(): void
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }
}
