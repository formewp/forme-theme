<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Core;

use VendorName\ReplaceMeTheme\Database\Migrations;

class Activator
{
    /** @var Migrations */
    private $migrations;

    public function __construct(Migrations $migrations)
    {
        $this->migrations = $migrations;
    }

    /**
     * Fired during theme activation.
     */
    public function activate(): void
    {
        // get migration messages and add them to transient for display once back in normal wp flow
        $messages = $this->migrations->migrate();
        set_transient('replace-me-admin-messages', $messages, 5);
    }
}
