@extends('layouts.main', ['logoUrl' => $logoUrl])
@section('content')
    <!-- Title -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 text-center">
                    <h1>Blog Name</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Posts -->
    <section>
        <div class="container">
            <?php foreach ($posts as $post): ?>
            <div class="card">
                <img class="card-img-top" src="<?= get_the_post_thumbnail_url($post->ID) ?>">
                <div class="card-body">

                    <h5 class="card-title"><?= get_the_title($post->ID) ?></h5>
                    <p class="card-text"><?= get_the_excerpt($post->ID) ?></p>
                    <a href="<?= get_the_permalink($post->ID) ?>" class="card-link">Read More...</a>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </section>
@endsection
