<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Controllers;

use Forme\Framework\Controllers\AbstractController;
use VendorName\ReplaceMeTheme\Core\View;
use VendorName\ReplaceMeTheme\Translators\SinglePageTranslator;

class SingleController extends AbstractController
{
    /** @var SinglePageTranslator */
    private $singlePageTranslator;

    /** @var View */
    private $view;

    public function __construct(SinglePageTranslator $singlePageTranslator, View $view)
    {
        $this->singlePageTranslator    = $singlePageTranslator;
        $this->view                    = $view;
    }

    public function __invoke($request = [])
    {
        $context = $this->singlePageTranslator->translate($request);

        return $this->view->render('default', $context);
    }
}
