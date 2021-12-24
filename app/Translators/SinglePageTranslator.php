<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Translators;

use Forme\Framework\Http\ServerRequest;

class SinglePageTranslator
{
    public function translate(ServerRequest $request): array
    {
        $postId           = $request['postId'];
        $context          = $request['fields'];
        $context['image'] = get_the_post_thumbnail_url($postId);

        return $context;
    }
}
