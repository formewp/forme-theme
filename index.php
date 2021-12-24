<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Controllers;

use Forme\Framework\Controllers\AbstractController;
use VendorName\ReplaceMeTheme\Core\View;

class IndexController extends AbstractController
{
    /** @var View */
    private $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke($request = [])
    {
        $posts            = get_posts();
        $context['posts'] = $posts;

        return $this->view->render('index', $context);
    }
}
