<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Registry;

use Forme\Framework\Registry\RegistryInterface;

class MenuRegistry implements RegistryInterface
{
    public function register(): void
    {
        register_nav_menu('header-menu', __('Header Menu'));
    }
}
