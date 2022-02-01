<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= home_url() ?>">
            <?php if (isset($logoUrl)):?>
            <img src="<?= $logoUrl ?>">
            <?php else:?>
            <?= bloginfo('name') ?>
            <?php endif?>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <!-- Nav -->
        <div class="collapse navbar-collapse search-form-wrapper">
            @include('partials.search')
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Header Menu -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                @include('partials.menu', ['menu' => menu('header-menu')])
            </ul>
        </div>
    </div>
</nav>
