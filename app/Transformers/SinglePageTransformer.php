<?php

declare(strict_types=1);

namespace VendorName\ReplaceMeTheme\Transformers;

use Forme\Framework\Http\ServerRequest;

class SinglePageTransformer
{
    public function transform(ServerRequest $request): array
    {
        $postId           = $request['postId'];
        $context          = $request['fields'];
        $context['image'] = get_the_post_thumbnail_url($postId);

        return $context;
    }
}
