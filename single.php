<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Controllers;

use Forme\Framework\Controllers\AbstractController;
use VendorName\ReplaceMeTheme\Core\View;
use VendorName\ReplaceMeTheme\Transformers\SinglePageTransformer;

class SingleController extends AbstractController
{
    /** @var SinglePageTransformer */
    private $singlePageTransformer;

    /** @var View */
    private $view;

    public function __construct(SinglePageTransformer $singlePageTransformer, View $view)
    {
        $this->singlePageTransformer    = $singlePageTransformer;
        $this->view                     = $view;
    }

    public function __invoke($request = [])
    {
        $context = $this->singlePageTransformer->transform($request);

        return $this->view->render('default', $context);
    }
}
