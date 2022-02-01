<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
    <title>Forme</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php wp_head(); ?>
</head>

<body {{ body_class() }}>
    @include('partials/nav', ['logoUrl' => $logoUrl])
    @yield('content')
    @include('partials/footer')
</body>

</html>
